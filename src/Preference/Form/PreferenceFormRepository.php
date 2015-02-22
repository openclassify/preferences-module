<?php namespace Anomaly\PreferencesModule\Preference\Form;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Ui\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\Form;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;

/**
 * Class PreferenceFormRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\Preference\Form
 */
class PreferenceFormRepository implements FormRepositoryInterface
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The preferences repository.
     *
     * @var PreferenceRepositoryInterface
     */
    protected $preferences;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new PreferenceFormRepositoryInterface instance.
     *
     * @param Repository                    $config
     * @param Container                     $container
     * @param PreferenceRepositoryInterface $preferences
     */
    public function __construct(Repository $config, Container $container, PreferenceRepositoryInterface $preferences)
    {
        $this->config      = $config;
        $this->preferences = $preferences;
        $this->container   = $container;
    }

    /**
     * Find an entry or return a new one.
     *
     * @param $id
     * @return string
     */
    public function findOrNew($id)
    {
        return $id;
    }

    /**
     * Save the form.
     *
     * @param Form $form
     * @return bool|mixed
     */
    public function save(Form $form)
    {
        $request   = $form->getRequest();
        $namespace = $form->getEntry() . '::';

        foreach ($form->getFields() as $field) {

            if (!$field instanceof FieldType) {
                continue;
            }

            $modifier = $field->getModifier();

            $this->preferences->set(
                $namespace . $field->getField(),
                $modifier->modify($request->get($field->getInputName()))
            );
        }
    }
}
