<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $username
 * @property string $item
 * @property int $quantity
 */
class Order extends \yii\db\ActiveRecord
{

    public $products;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'products', 'quantity'], 'required'],
            [['id', 'quantity'], 'integer'],
            // [['item'], 'string',],
            [['username'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'item' => 'Item',
            'quantity' => 'Quantity',
        ];
    }

    public function getOrderItems(){
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }
}
