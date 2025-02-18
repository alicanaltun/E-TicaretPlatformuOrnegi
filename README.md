
# E-Ticaret Platformu Örneği: "Duba"

Bu proje, oyunseverlerin farklı platformlarda bulunan dijital video oyunlarını güvenli ve hızlı bir şekilde satın alabilecekleri bir e-ticaret sitesi örneğidir. Kullanıcı dostu arayüzü ve güçlü yönetim paneliyle hem alıcılar hem de yöneticiler için pratik bir alışveriş deneyimi sunar.(Geriye dönük proje Ocak 2024)

## Örnek Kullanım Senaryosu ve Videolu Tanıtım

[Proje Tanıtım Videosunu İzlemek için Tıklayınız]()

## Ekran Görüntüleri

![Resim Açıklaması](https://github.com/alicanaltun/E-TicaretPlatformuOrnegi/blob/main/screenshot.png?raw=true)

![Resim Açıklaması](https://github.com/alicanaltun/E-TicaretPlatformuOrnegi/blob/main/screenshot2.png?raw=true)

## Özellikler

- Erişim ve yetki sınırlandırmaları sahip bir altyapı bulunmaktadır.
- Kullanıcıyı uyarıcı ve yönlendirici hata mesajları bulunmaktadır.
- Şifre güvenliği için **salt** ve **SHA-512** hash algoritması kullanılmıştır

### Kullanıcı Özellikleri

- Kullanıcı kaydı yapabilme ve giriş işlemi.
- Ürünleri görüntüleme.
- Ürünler içinde arama işlemi.
- Ürünleri tür, platform ve fiyat aralığı açısından filtreleme.
- Ürünleri sepete ekleme, çıkarma işlemleri.
- Sepeti onaylayıp sipariş verme işlemi.
- Ödeme işlemleri.
- Anında ürün dijital anahtarına (key) erişim.
- Sipariş geçmişini görüntüleme ve detaylarını inceleyebilme.
- Kişisel bilgileri güncelleyebilme.
- Şifre değiştirme işlemleri.

### Yönetici Özellikleri

- Yönetici hesabıyla giriş yapma işlemi.
- Ürün ekleme, silme ve içeriğini düzenleme işlemleri.
- Ürünleri kategoriye göre sıralanabilir tablo şeklinde görüntüleme.
- Ürünlerin satış adetini görüntüleyebilme.
- Ürünlere dijital anahtar (key) ekleme, silme, düzenleme işlemleri.
- Kullanılan ve kullanılmayan ürün anahtarlarını filtreleme ve görüntüleme.
- Ürünler içinde arama işlemi.


## Kullanılan Teknolojiler

- **Backend:** PHP
- **Frontend:** HTML, CSS, JavaScript, jQuery
- **Veritabanı:** MySQL
- **Sunucu:** Apache (WAMP)

## Kurulum

1. `duba.sql` dosyasını "MySQL" veritabanında çalıştırın.
2. `duba` klasörünü web sunucunuzun **www (Wamp)** veya **htdocs (Xampp)** dizinine kopyalayın.
3. Tarayıcınızda `http://localhost/duba/` adresine giderek sitenin anasayfasına (index) ulaşabilirsiniz.
4. `http://localhost/duba/yonetimpaneli/admin.php` adresinden yönetici (admin) sayfasına erişebilirsiniz.
5. Anasayfadaki **slider**'ı düzenlemek için `duba\images\banner` dizinine banner resimlerini attıktan sonra projeyi **Visual Studio Code**'da açarak düzenleyebilirsiniz.
6. Yönetici sayfası üzerinden ürün bilgilerini doldurup video ve resimlerle beraber ürününüzü ekleyebilirsiniz.

## Kullanım

1. Kullanıcı olarak giriş yapın veya yeni bir hesap oluşturun.
2. Ürünleri seçerek sepete ekleyin.
3. Ödeme işlemini tamamlayarak sipariş verin.
4. Sipariş geçmişinden dijital anahtarınıza ulaşabilirsiniz.

## Katkıda Bulunma

Çalışan ve yönetici sayfaları geliştirme aşamasındadır. Katkıda bulunmak isterseniz, lütfen bir **pull request** gönderin veya bir **issue** açın.

## Lisans

Bu proje şu an için lisanssızdır.

## Bilgilendirme (Disclaimer)
Bu proje hiçbir ticari amaç güdülmeden kendimi geliştirmek amacıyla oluşturduğum örnek bir projedir. Video içerisinde kullanılan görseller ve videolar telif haklarına tabi olduğundan paylaşılmamıştır.

This project is a sample project created for self-improvement without any commercial intent. The images and videos used in the video are subject to copyright and have not been shared.
