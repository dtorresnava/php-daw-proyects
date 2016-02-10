<?php

/**
 * This is the model class for table "grupos".
 *
 * The followings are the available columns in table 'grupos':
 * @property integer $id
 * @property integer $actividades_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $dias_semana
 * @property string $horario
 * @property string $estado
 * @property string $cuota
 * @property integer $profesor_id
 * @property integer $salas_id
 * @property integer $plazas
 *
 * The followings are the available model relations:
 * @property Apuntes[] $apuntes
 * @property Eventos[] $eventoses
 * @property Actividades $actividades
 * @property Salas $salas
 * @property Usuarios $profesor
 * @property UsuariosGrupos[] $usuariosGruposes
 */
class Grupos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grupos';
	}
        
        

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('actividades_id, profesor_id, salas_id', 'required'),
			array('actividades_id, profesor_id, salas_id, plazas', 'numerical', 'integerOnly'=>true),
			array('dias_semana', 'length', 'max'=>7),
			array('horario', 'length', 'max'=>10),
			array('estado', 'length', 'max'=>1),
			array('cuota', 'length', 'max'=>5),
			array('fecha_inicio, fecha_fin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, actividades_id, fecha_inicio, fecha_fin, dias_semana, horario, estado, cuota, profesor_id, salas_id, plazas', 'safe', 'on'=>'search'),
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
			'apuntes' => array(self::HAS_MANY, 'Apuntes', 'grupos_id'),
			'eventoses' => array(self::MANY_MANY, 'Eventos', 'eventos_grupos(grupos_id, eventos_id)'),
			'actividades' => array(self::BELONGS_TO, 'Actividades', 'actividades_id'),
			'salas' => array(self::BELONGS_TO, 'Salas', 'salas_id'),
			'profesor' => array(self::BELONGS_TO, 'Usuarios', 'profesor_id'),
			'usuariosGruposes' => array(self::HAS_MANY, 'UsuariosGrupos', 'grupos_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'actividades_id' => 'Actividades',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'dias_semana' => 'Dias Semana',
			'horario' => 'Horario',
			'estado' => 'Estado',
			'cuota' => 'Cuota',
			'profesor_id' => 'Profesor',
			'salas_id' => 'Salas',
			'plazas' => 'Plazas',
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

		
		$criteria->compare('actividades_id',$this->actividades_id);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('dias_semana',$this->dias_semana,true);
		$criteria->compare('horario',$this->horario,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('cuota',$this->cuota,true);
		$criteria->compare('profesor_id',$this->profesor_id);
		$criteria->compare('salas_id',$this->salas_id);
		$criteria->compare('plazas',$this->plazas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Grupos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

          
        
 }
