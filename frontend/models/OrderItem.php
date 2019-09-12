<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $item_id
 * @property int $order_id
 * @property string $created_at
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'order_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item_id' => Yii::t('app', 'Item ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrderItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderItemQuery(get_called_class());
    }

    public function getItem(){
        return $this->hasOne(Items::className(), ['id' => 'item_id']);
    }
}
