<?php

namespace App\Models;

use CodeIgniter\Model;

class RuleModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_rule';
    protected $primaryKey       = 'id_rule';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_penyakit',
        'nama_gejala',
        'mb',
        'md',
        'nilai_cf',
    ];
    public function penyakit()
    {
        return $this->belongsTo('App\Models\PenyakitModel', 'nama_penyakit', 'nama_penyakit');
    }

    public function gejala()
    {
        return $this->belongsTo('App\Models\GejalaModel', 'nama_gejala', 'nama_gejala');
    }


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}