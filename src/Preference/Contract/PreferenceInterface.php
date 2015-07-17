<?php namespace Anomaly\PreferencesModule\Preference\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Interface PreferenceInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PreferencesModule\PreferenceInterface\Contract
 */
interface PreferenceInterface extends EntryInterface
{

    /**
     * Get the key.
     *
     * @return string
     */
    public function getKey();

    /**
     * Set the key.
     *
     * @param $key
     * @return $this
     */
    public function setKey($key);

    /**
     * Get the user.
     *
     * @return UserInterface
     */
    public function getUser();

    /**
     * Set the user.
     *
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user);

    /**
     * Get the value.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Set the value.
     *
     * @param $value
     * @return $this
     */
    public function setValue($value);
}
