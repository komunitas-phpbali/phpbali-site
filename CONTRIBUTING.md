# Panduan berkontribusi
Terdapat tiga jalan bagi Anda jika berkontribusi melalui Github:
1. Memberi bintang ⭐️ pada repository ini.
1. Mengirimkan [isu](https://github.com/BaliPHP/phpbali-site/issues).
1. Jangan mengirimkan pull request tanpa ada issue agar tidak overlapping
1. Mengirimkan pull request ke branch `develop`. <br />
   Jika Anda mengirimkan pull request, pastikan fitur atau pembaharuan yang ingin Anda kerjakan tidak dilakukan pada branch master agar memudahkan maintainer project dan tidak mengganggu jalannya repository yang sedang dikerjakan.

*Kebijakan nomor 4 kembali kepada maintainer project*.

## Panduan khusus untuk nomor 3
Jika Anda ingin berkontribusi melalui kode seperti menambah atau mengubah fitur, mohon lakukan petunjuk di bawah ini.
- Fork repository dan pastikan fork repo up to date melalui panduan [gist ini](https://gist.github.com/CristinaSolana/1885435) atau [backstroke](https://backstroke.co/).
- Git clone repository yang sudah di fork.
- Menginstal dependencies dengan perintah `composer install`
- Buat branch baru sesuai dengan issue atau fitur yang ingin dikerjakan. Misalnya membuat refactoring code di Topic module, maka buat branch: ```refactor:topic-module```.
- Setelah selesai lakukan git push dan lakukan pull request.
