<?php

/**
 * This is the model class for table "apuntes".
 *
 * The followings are the available columns in table 'apuntes':
 * @property integer $id
 * @property integer $usuarios_id
 * @property string $importe
 * @property string $concepto
 * @property string $fecha
 * @property integer $grupos_id
 * @property string $mes
 * @property string $fecha_pago
 *
 * The followings are the available model relations:
 * @property Grupos $grupos
 * @property Usuarios $usuarios
 */
class Apuntes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'apuntes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, usuarios_id, grupos_id', 'required'),
			array('id, usuarios_id, grupos_id', 'numerical', 'integerOnly'=>true),
			array('importe', 'length', 'max'=>3),
			array('concepto', 'length', 'max'=>40),
			array('fecha, mes, fecha_pago', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, usuarios_id, importe, concepto, fecha, grupos_id, mes, fecha_pago', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'grupos' => array(self::BELONGS_TO, 'Grupos', 'grupos_id'),
			'usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuarios_id' => 'Usuarios',
			'importe' => 'Importe',
			'concepto' => 'Concepto',
			'fecha' => 'Fecha',
			'grupos_id' => 'Grupos',
			'mes' => 'Mes',
			'fecha_pago' => 'Fecha Pago',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('usuarios_id',$this->usuarios_id);
		$criteria->compare('importe',$this->importe,true);
		$criteria->compare('concepto',$this->concepto,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('grupos_id',$this->grupos_id);
		$criteria->compare('mes',$this->mes,true);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Apuntes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
