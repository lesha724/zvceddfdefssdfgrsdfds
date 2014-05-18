<?php

class FilterForm extends CFormModel
{
	public $discipline;
	public $group;

	public $filial = 0;
    public $faculty;
    public $speciality;
    public $year_of_admission;
    public $semester;

/* field for thematic plan */
    public $duration = 0;
    public $teacher = 0;
    public $code = 0;

/* field for other/gostem */
    public $chair = 0;
    public $d1 = 0;
    public $gostem1;
    public $nr1;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('discipline, group', 'required', 'on' => 'journal, modules'),
			array('filial, faculty, speciality, year_of_admission, discipline, semester', 'required', 'on' => 'thematicPlan'),
            array('duration, teacher, code', 'safe', 'on' => 'thematicPlan'),
            array('chair, gostem1, nr1, d1', 'safe', 'on' => 'gostem'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'discipline'=> tt('Дисциплина'),
			'group'=> tt('Группа'),
			'filial'=> tt('Филиал'),
			'faculty'=> tt('Факультет'),
			'speciality'=> tt('Специальность'),
			'year_of_admission'=> tt('Год приема'),
			'type'=> tt('Вид'),
			'semester'=> tt('№ семестра'),
            'duration' => tt('Длительность занятий'),
            'teacher' => tt('Преподаватель'),
            'chair' => tt('Кафедра'),
            'gostem1' => tt('Гос. экзамен'),
            'nr1' => tt('Кафедра'),
		);
	}
}