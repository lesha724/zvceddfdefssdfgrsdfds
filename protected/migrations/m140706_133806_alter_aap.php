<?php

class m140706_133806_alter_aap extends CDbMigration
{
	public function safeUp()
	{
        $sql = <<<SQL
        ALTER TABLE AAP DROP CONSTRAINT FK_AAP113_UCHZ1
SQL;
        $this->execute($sql);

		$sql = <<<SQL
ALTER TABLE aap
    ALTER COLUMN aap2 TYPE VARCHAR(35),
    ALTER COLUMN aap3 TYPE VARCHAR(20),
    ALTER COLUMN aap4 TYPE VARCHAR(20),
    ALTER COLUMN aap6 TYPE VARCHAR(100),
    ALTER COLUMN aap7 TYPE SMALLINT,
    ALTER COLUMN aap10 TYPE SMALLINT,
    ALTER COLUMN aap11 TYPE VARCHAR(5),
    ALTER COLUMN aap12 TYPE VARCHAR(15),
    ALTER COLUMN aap14 TYPE SMALLINT,
    ALTER COLUMN aap15 TYPE SMALLINT,
    ALTER COLUMN aap17 TYPE VARCHAR(17),
    ALTER COLUMN aap18 TYPE SMALLINT,
    ALTER COLUMN aap19 TYPE VARCHAR(10),
    ALTER COLUMN aap20 TYPE VARCHAR(15),
    ALTER COLUMN aap21 TYPE VARCHAR(100),
    ALTER COLUMN aap24 TYPE VARCHAR(10),
    ALTER COLUMN aap25 TYPE VARCHAR(100),
    ALTER COLUMN aap26 TYPE VARCHAR(15),
    ALTER COLUMN aap27 TYPE VARCHAR(50),
    ALTER COLUMN aap29 TYPE VARCHAR(10),
    ALTER COLUMN aap30 TYPE VARCHAR(100),
    ALTER COLUMN aap31 TYPE VARCHAR(15),
    ALTER COLUMN aap32 TYPE VARCHAR(50),
    ALTER COLUMN aap33 TYPE SMALLINT,
    ALTER COLUMN aap34 TYPE SMALLINT,
    ALTER COLUMN aap36 TYPE VARCHAR(50),
    ALTER COLUMN aap37 TYPE VARCHAR(50),
    ALTER COLUMN aap38 TYPE VARCHAR(100),
    ALTER COLUMN aap39 TYPE VARCHAR(15),
    ALTER COLUMN aap41 TYPE SMALLINT,
    ALTER COLUMN aap42 TYPE VARCHAR(100),
    ALTER COLUMN aap43 TYPE SMALLINT,
    ALTER COLUMN aap46 TYPE VARCHAR(15),
    ALTER COLUMN aap48 TYPE VARCHAR(15),
    ALTER COLUMN aap49 TYPE VARCHAR(5),
    ALTER COLUMN aap50 TYPE SMALLINT,
    ALTER COLUMN aap52 TYPE SMALLINT,
    ALTER COLUMN aap56 TYPE DOUBLE PRECISION,
    ALTER COLUMN aap57 TYPE SMALLINT,
    ALTER COLUMN aap58 TYPE SMALLINT,
    ALTER COLUMN aap59 TYPE SMALLINT,
    ALTER COLUMN aap60 TYPE VARCHAR(150),
    ALTER COLUMN aap61 TYPE VARCHAR(50),
    ALTER COLUMN aap59 TYPE SMALLINT,
    ALTER COLUMN aap63 TYPE VARCHAR(150),
    ALTER COLUMN aap64 TYPE VARCHAR(50),
    ALTER COLUMN aap65 TYPE SMALLINT,
    ALTER COLUMN aap66 TYPE SMALLINT,
    ALTER COLUMN aap67 TYPE VARCHAR(100),
    ALTER COLUMN aap68 TYPE VARCHAR(50),
    ALTER COLUMN aap69 TYPE VARCHAR(75),
    ALTER COLUMN aap70 TYPE VARCHAR(50),
    ALTER COLUMN aap71 TYPE VARCHAR(50),
    ALTER COLUMN aap72 TYPE VARCHAR(75),
    ALTER COLUMN aap73 TYPE VARCHAR(50),
    ALTER COLUMN aap74 TYPE SMALLINT,
    ALTER COLUMN aap75 TYPE VARCHAR(150),
    ALTER COLUMN aap76 TYPE SMALLINT,
    ALTER COLUMN aap77 TYPE VARCHAR(150),
    ALTER COLUMN aap78 TYPE SMALLINT,
    ALTER COLUMN aap79 TYPE VARCHAR(15),
    ALTER COLUMN aap80 TYPE VARCHAR(15),
    ALTER COLUMN aap81 TYPE VARCHAR(15),
    ALTER COLUMN aap82 TYPE VARCHAR(50),
    ALTER COLUMN aap83 TYPE SMALLINT,
    ALTER COLUMN aap84 TYPE VARCHAR(15),
    ALTER COLUMN aap85 TYPE VARCHAR(15),
    ALTER COLUMN aap86 TYPE VARCHAR(15),
    ALTER COLUMN aap87 TYPE VARCHAR(50),
    ALTER COLUMN aap88 TYPE VARCHAR(50),
    ALTER COLUMN aap90 TYPE VARCHAR(150),
    ALTER COLUMN aap91 TYPE VARCHAR(50),
    ALTER COLUMN aap92 TYPE VARCHAR(50),
    ALTER COLUMN aap93 TYPE VARCHAR(50),
    ALTER COLUMN aap94 TYPE VARCHAR(50),
    ALTER COLUMN aap95 TYPE VARCHAR(50),
    ALTER COLUMN aap96 TYPE VARCHAR(50),
    ALTER COLUMN aap97 TYPE VARCHAR(50),
    ALTER COLUMN aap98 TYPE VARCHAR(50),
    ALTER COLUMN aap99 TYPE VARCHAR(50),
    ALTER COLUMN aap100 TYPE VARCHAR(50),
    ALTER COLUMN aap101 TYPE VARCHAR(50),
    ALTER COLUMN aap102 TYPE VARCHAR(5),
    ALTER COLUMN aap103 TYPE VARCHAR(100),
    ALTER COLUMN aap104 TYPE VARCHAR(100),
    ALTER COLUMN aap105 TYPE VARCHAR(100),
    ALTER COLUMN aap106 TYPE VARCHAR(100),
    ALTER COLUMN aap107 TYPE VARCHAR(100),
    ALTER COLUMN aap108 TYPE SMALLINT,
    ALTER COLUMN aap109 TYPE VARCHAR(200),
    ALTER COLUMN aap110 TYPE VARCHAR(50),
    ALTER COLUMN aap111 TYPE VARCHAR(200)

SQL;
		$this->execute($sql);


	}

	public function safeDown()
	{
		echo "m140706_133806_alter_aap does not support migration down.\\n";
		return false;
	}
}