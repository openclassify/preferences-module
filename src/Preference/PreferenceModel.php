<?php namespace Anomaly\PreferencesModule\Preference;

use Anomaly\PreferencesModule\Preference\Command\GetValueFieldType;
use Anomaly\PreferencesModule\Preference\Command\GetValuePresenter;
use Anomaly\PreferencesModule\Preference\Command\ModifyValue;
use Anomaly\PreferencesModule\Preference\Contract\PreferenceInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Model\Preferences\PreferencesPreferencesEntryModel;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class PreferenceModel
 *
 * @method Builder belongingToUser(UserInterface $user)
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PreferencesModule\PreferenceInterface
 */
class PreferenceModel extends PreferencesPreferencesEntryModel implements PreferenceInterface
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Limit to preferences belonging to the provided user.
     *
     * @param Builder       $query
     * @param UserInterface $user
     */
    public function scopeBelongingToUser(Builder $query, UserInterface $user)
    {
        $query->where('user_id', $user->getId());
    }

    /**
     * Get the key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the key.
     *
     * @param $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the user.
     *
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the user.
     *
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value.
     *
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the value.
     *
     * @param $value
     * @return $this
     */
    protected function setValueAttribute($value)
    {
        $this->attributes['value'] = $this->dispatch(new ModifyValue($this, $value));

        return $this;
    }

    /**
     * Get the value attribute.
     *
     * @return mixed
     */
    protected function getValueAttribute()
    {
        /* @var FieldType $type */
        $type = $this->dispatch(new GetValueFieldType($this));

        return $type->getValue();
    }

    /**
     * Return the related value
     * field type presenter.
     *
     * @return FieldTypePresenter
     */
    public function value()
    {
        return $this->dispatch(new GetValuePresenter($this));
    }
}
