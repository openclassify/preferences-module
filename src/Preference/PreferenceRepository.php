<?php namespace Anomaly\PreferencesModule\Preference;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceInterface;
use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Auth\Guard;

/**
 * Class PreferenceRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\PreferenceInterface
 */
class PreferenceRepository extends EntryRepository implements PreferenceRepositoryInterface
{

    /**
     * The authentication guard.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The preference model.
     *
     * @var PreferenceModel
     */
    protected $model;

    /**
     * The preferences collection.
     *
     * @var PreferenceCollection
     */
    protected $preferences;

    /**
     * Create a new PreferenceRepositoryInterface instance.
     *
     * @param Guard           $auth
     * @param PreferenceModel $model
     */
    public function __construct(Guard $auth, PreferenceModel $model)
    {
        $this->auth  = $auth;
        $this->model = $model;

        $this->preferences = new PreferenceCollection();

        if ($user = $this->auth->user()) {
            $this->preferences = $this->model->belongingToUser($auth->getUser())->get();
        }
    }

    /**
     * Get a preference.
     *
     * @param $key
     * @return null|PreferenceInterface
     */
    public function get($key)
    {
        return $this->preferences->get($key);
    }

    /**
     * Set a preferences value.
     *
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        if (!$user = $this->auth->getUser()) {
            throw new \Exception('The user could not be determined.');
        }

        $preference = $this->findByKeyOrNew($key);

        $preference->setUser($user);
        $preference->setValue($value);

        return $this->save($preference);
    }

    /**
     * Get a preference value presenter instance.
     *
     * @param $key
     * @return null|FieldTypePresenter
     */
    public function value($key)
    {
        if ($preference = $this->get($key)) {
            return $preference->value();
        }

        return null;
    }

    /**
     * Find a preference by it's key
     * or return a new instance.
     *
     * @param $key
     * @return PreferenceInterface
     */
    public function findByKeyOrNew($key)
    {
        /* @var UserInterface $user */
        if (!$user = $this->auth->getUser()) {
            throw new \Exception('The user could not be determined.');
        }

        if (!$preference = $this->model->where('key', $key)->where('user_id', $user->getId())->first()) {

            $preference = $this->model->newInstance();

            $preference->setKey($key);
            $preference->setUser($user);
        }

        return $preference;
    }

    /**
     * Find all preferences with namespace.
     *
     * @param $namespace
     * @return PreferenceCollection
     */
    public function findAllByNamespace($namespace)
    {
        return $this->model->where('key', 'LIKE', $namespace . '%')->get();
    }
}
