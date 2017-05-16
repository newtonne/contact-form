<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\contactform\models;

use craft\base\Model;

class Settings extends Model
{
    /**
     * @var string|string[]|null
     */
    public $toEmail;

    /**
     * @var string|null
     */
    public $prependSender;

    /**
     * @var string|null
     */
    public $prependSubject;

    /**
     * @var bool
     */
    public $allowAttachments = false;

    /**
     * @var string|null
     */
    public $honeypotField;

    /**
     * @var string|null
     */
    public $successFlashMessage;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->prependSender === null) {
            $this->prependSender = \Craft::t('contactform', 'On behalf of');
        }

        if ($this->prependSubject === null) {
            $this->prependSubject = \Craft::t('contactform', 'New message from {siteName}', [
                'siteName' => \Craft::$app->getSites()->currentSite->name
            ]);
        }

        if ($this->successFlashMessage === null) {
            $this->successFlashMessage = \Craft::t('contactform', 'Your message has been sent.');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['toEmail', 'successFlashMessage'], 'required'],
            [['toEmail', 'prependSender', 'prependSubject', 'honeypotField', 'successFlashMessage'], 'string'],
        ];
    }
}
