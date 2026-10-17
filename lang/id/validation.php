<?php

return [
    'required' => ':Attribute wajib diisi.',
    'email' => ':Attribute harus berupa alamat email yang benar.',
    'unique' => ':Attribute sudah terdaftar.',
    'exists' => ':Attribute yang dipilih tidak ditemukan.',
    'numeric' => ':Attribute harus berupa angka.',
    'integer' => ':Attribute harus berupa bilangan bulat.',
    'digits' => ':Attribute harus terdiri dari :digits angka.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'uuid' => ':Attribute tidak valid.',
    'string' => ':Attribute harus berupa teks.',
    'min' => [
        'numeric' => ':Attribute minimal :min.',
        'string' => ':Attribute minimal :min karakter.',
    ],
    'max' => [
        'numeric' => ':Attribute maksimal :max.',
        'string' => ':Attribute maksimal :max karakter.',
    ],
    'between' => [
        'numeric' => ':Attribute harus di antara :min sampai :max.',
    ],

    'attributes' => [
        'name' => 'nama',
        'email' => 'email',
        'password' => 'kata sandi',
        'npm' => 'NPM',
        'nama' => 'nama',
        'kelas_id' => 'kelas',
        'angkatan' => 'angkatan',
        'kode_mk' => 'kode mata kuliah',
        'nama_mk' => 'nama mata kuliah',
        'sks' => 'SKS',
        'mahasiswa_id' => 'mahasiswa',
        'mata_kuliah_id' => 'mata kuliah',
        'kehadiran' => 'nilai kehadiran',
        'tugas' => 'nilai tugas',
        'uts' => 'nilai UTS',
        'uas' => 'nilai UAS',
    ],
];