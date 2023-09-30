# Projek DOT

Sebuah website yang fungsi utamnya adalah mengelolah data mahasiswa dari suatu universitas, admin bisa menambah, mengubah dan menghapus data mahasiswa dan juga data admin.

## Desain Database

Database User:
- id
- name
- email
- password

Database Mahasiswa:
- id
- nama
- NIM
- Angkatan
- Jurusan
- last Update By

Relasi
- Table User HasMany Table Mahasiswa
- Table Mahasiswa BelongsTo Table User

## Screenshot Aplikasi

Screenshot dari aplikasi yang menunjukkan fitur-fitur utama.

## Dependency

- Php: "^7.3|^8.0",
- Laravel: 8


