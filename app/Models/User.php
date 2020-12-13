<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;

    class User extends Model{
        protected $table = 'tbluser'; //table name
        protected $fillable = [ //table column
            'username', 'password', 'jobid'
        ];

        public $timestamps = false;
        protected $primaryKey = 'id';

        protected $hidden = [ //hiding the password
            'password'
        ];
}