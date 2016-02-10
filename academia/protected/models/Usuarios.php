<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $usuario
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property string $fecha_alta
 * @property string $estado
 * @property string $telefono
 * @property string $origen
 * @property string $observ
 * @property string $ult_fecha
 * @property string $roles
 *
 * The followings are the available model relations:
 * @property Apuntes[] $apuntes
 * @property Asistentes[] $asistentes
 * @property Grupos[] $gruposes
 * @property UsuariosGrupos[] $usuariosGruposes
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, nombre, password, roles', 'required'),
			array('usuario', 'length', 'max'=>16),
			array('nombre', 'length', 'max'=>45),
			array('email', 'length', 'max'=>128),
			array('password', 'length', 'max'=>32),
			array('estado, origen', 'length', 'max'=>1),
			array('telefono', 'length', 'max'=>9),
			array('roles', 'length', 'max'=>8),
			array('fecha_alta, observ', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, usuario, nombre, email, password, fecha_alta, estado, telefono, origen, observ, ult_fecha, roles', 'safe', 'on'=>'search'),
		);
	}
        /**
         * Antes de ejecutar la acción de guardado realiza la operación indicada
         * en ete casoi asignar el valor de la fecha actual.
         * Evento que se ejecuta antes de una acción. 
         */
        
        public function beforeSave(){
            if($this->isNewRecord){
                $this->fecha_alta=date('d/m/Y');
                $this->estado='P';
            }
            $this->ult_fecha=date('d/m/Y');
            return parent::beforeSave();
        }
        

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'apuntes' => array(self::HAS_MANY, 'Apuntes', 'usuarios_id'),
			'asistentes' => array(self::HAS_MANY, 'Asistentes', 'usuarios_id'),
			'grupos' => array(self::HAS_MANY, 'Grupos', 'profesor_id'),
			'usuariosGrupos' => array(self::HAS_MANY, 'UsuariosGrupos', 'usuarios_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario' => 'Usuario',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'password' => 'Password',
			'fecha_alta' => 'Fecha Alta',
			'estado' => 'Estado',
			'telefono' => 'Telefono',
			'origen' => 'Origen',
			'observ' => 'Observ',
			'ult_fecha' => 'Ult Fecha',
			'roles' => 'Roles',
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
	public function search($rol='AL')
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fecha_alta',$this->fecha_alta,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('origen',$this->origen,true);
		$criteria->compare('observ',$this->observ,true);
		//$criteria->compare('ult_fecha',$this->ult_fecha,true);
		$criteria->compare('roles',$rol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function scopes()
            {
                return array(
                    "profesores"=>array(
                        'condition'=>'roles="PR"',
                        "order"=>'nombre'
                    ),
                    "alumnos"=>array(
                        'condition'=>'roles="AL"',
                        "order"=>'nombre'
                    )
                );
            }
            
        public function behaviors()
        {
            return array('datetimeI18NBehavior' => array('class' => 'DateTimeI18NBehavior'));
        }
       
}
