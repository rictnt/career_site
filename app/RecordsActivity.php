<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 5/12/2015
 * Time: 1:10 PM
 */

namespace App;

use Illuminate\Support\Facades\Auth;
use ReflectionClass;
trait RecordsActivity
{
    /**
     * Register the necessary event listeners.
     *
     * @return void
     */
    protected static function bootRecordsActivity()
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }
    }
    /**
     * Record activity for the model.
     *
     * @param  string $event
     * @return void
     */
    public function recordActivity($event)
    {
        Activity::create([
            'subject_id' => $this->id,
            'subject_type' => get_class($this),
            'name' => $this->getActivityName($this, $event),
            'user_id' => Auth::user()->id
        ]);
    }
    /**
     * Prepare the appropriate activity name.
     *
     * @param  mixed  $model
     * @param  string $action
     * @return string
     */
    protected function getActivityName($model, $action)
    {
        $name = strtolower((new ReflectionClass($model))->getShortName());
        return "{$action}_{$name}";
    }
    /**
     * Get the model events to record activity for.
     *
     * @return array
     */
    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }
        return [
            'created', 'deleted', 'updated'
        ];
    }
}