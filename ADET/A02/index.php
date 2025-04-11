<?php
include("connect.php");

if (isset($_GET['killswitch'])) {
  $killswitchvalue = $_GET['killswitch'];
  if($killswitchvalue == "PASSWORDITO"){
    $settingsQueryUpdate = "UPDATE settings SET settingValue = 'off' WHERE settingName = 'status'";
    executeQuery($settingsQueryUpdate);
  }
}

$theme = "light";
$settingsQuery = "SELECT * FROM settings WHERE settingName = 'theme'";
$settingsResult = executeQuery($settingsQuery);
while($settingsRow = mysqli_fetch_assoc($settingsResult)){
  $theme = $settingsRow['settingValue'];
}

$status = "on";
$settingsQuery = "SELECT * FROM settings WHERE settingName = 'status'";
$settingsResult = executeQuery($settingsQuery);
while($settingsRow = mysqli_fetch_assoc($settingsResult)){
  $status = $settingsRow['settingValue'];
}

if($status == "off"){
  header("Location: WebsiteUnavailable.php");
}

$page = "home";
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
    case "home":
    case "campaigns":
    case "contact":
      break;
    default:
      header("Location: ?page=home");
      break;
  }
} else {
  header("Location: ?page=home");
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UGC Portfolio 💖</title>
  <link rel="icon" href="images/verythea_logo.png" type="image/x-icon">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Lora', serif;
      background-color: #fff0f6;
    }

    h1, h2, h3, h4, h5, h6,
    .navbar-brand {
      font-family: 'Oswald', sans-serif;
    }

    .btn,
    .form-control,
    .nav-link {
      font-family: 'Quicksand', sans-serif;
    }

    .card,
    .badge,
    .label {
      font-family: 'Roboto Condensed', sans-serif;
    }

    body[data-bs-theme="light"] {
      --bs-body-bg: #fff0f6;
      --bs-body-color: #550033;
      --bs-primary: #ff69b4;
      --bs-primary-rgb: 255, 105, 180;
      --bs-link-color: #d63384;
      --bs-link-hover-color: #ad2d6b;
    }

    .navbar {
      background-color: #fff0f6 !important;
    }

    .card {
      background-color: #ffe4ec;
      border: none;
    }

    .btn-primary {
      background-color: #ff69b4;
      border-color: #ff69b4;
    }

    .btn-outline-primary {
      color: #ff69b4;
      border-color: #ff69b4;
    }

    .btn-outline-primary:hover {
      background-color: #ff69b4;
      color: white;
    }

    .profilepic {
      width: 50px;
      height: 50px;
      border-radius: 100px;
      object-fit: cover;
      background-color: #ffb6c1;
    }
  </style>
</head>

<body data-bs-theme="<?php echo $theme ?>">

  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold">✨ My UGC Portfolio</a>
    </div>
  </nav>

  <div class="container-fluid mt-3">
    <div class="row gy-4">

<!-- Main column first on mobile -->
<div class="col-12 col-md-8 col-lg-6 order-1 order-md-2">
  <div class="card shadow rounded-5 p-4 h-100" style="max-height: 85vh; overflow-y: auto">
    <?php include("shared/" . $page . ".php"); ?>
  </div>
</div>

<!-- Left menu -->
<div class="col-12 col-md-2 col-lg-3 order-2 order-md-1">
  <!-- Menu Card -->
  <div class="card shadow rounded-5 p-3 mb-3">
    <h4 class="my-2">💖 Menu</h4>
    <a href="?page=home" class="btn btn-outline-primary my-1 w-100">Home</a>
    <a href="?page=campaigns" class="btn btn-outline-primary my-1 w-100">Campaigns</a>
    <a href="?page=contact" class="btn btn-outline-primary my-1 w-100">Contact</a>
  </div>

  <!-- UGC Tips Card -->
  <div class="card shadow rounded-5 p-3">
    <h5 class="my-2">🎥 UGC Tips</h5>
    <ul class="list-unstyled small">
      <li>💡 Use natural light or a soft ring light</li>
      <li>🎤 Record audio in a quiet space</li>
      <li>📐 Frame your shots cleanly & consistently</li>
      <li>📋 Start with a hook in the first 3 seconds</li>
      <li>💅 Showcase textures & product use up close</li>
    </ul>
  </div>
</div>


      <!-- Right column -->
      <div class="col-12 col-md-2 col-lg-3 order-3">
        <div class="card shadow rounded-5 p-3 h-100">
          <h5 class="mb-3">💼 Recent Collabs</h5>

          <div class="d-flex align-items-center mb-3">
            <img src="https://truebeautyaus.com/cdn/shop/collections/brilliantskin.png?v=1713224500" class="profilepic me-2" alt="Brilliant">
            <span>Brilliant</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyP_KXkUQWgYFaHnWHvj2Xg59nB1x09eUKeQ&s" class="profilepic me-2" alt="O.TWO.O">
            <span>O.TWO.O</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfjurvlK8R3s9gLWTN7rWQSNtJvcde081Qgw&s" class="profilepic me-2" alt="PAULASH">
            <span>PAULASH</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="data:image/png;base64,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" class="profilepic me-2" alt="J.M.C.Y">
            <span>J.M.C.Y</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="data:image/png;base64,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" class="profilepic me-2" alt="Skintific">
            <span>Skintific</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="data:image/png;base64,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" class="profilepic me-2" alt="Maybelline">
            <span>Maybelline</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="data:image/png;base64,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" class="profilepic me-2" alt="Careline">
            <span>Careline</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PDxAPDxAPEA8NEA8QDw8PDhAQEBAQFhUWFhURFRYYHSggGBolGxUVITEhJSkrLi4uFx84ODMsNygwLisBCgoKDg0OGBAQFy0dHR8tLS0tLSstLSstKy0tLSstKy0rLS0rLS0tKy0tLS0tKy0rLS0tLS0tLSstKy0uLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAbAAACAgMBAAAAAAAAAAAAAAACAwUGAAEEB//EAEkQAAIBAQMFCgkICQUBAAAAAAECAAMEBREGEiExUSIyQVJhcYGRodETFlNyc5OxssEHFTRCgpKj4SMzVGJjosLS8BQkQ4PiF//EABoBAAMBAQEBAAAAAAAAAAAAAAABAgMFBAb/xAA4EQACAQIDAwoFAwQDAQAAAAAAAQIDEQQSMQUhURUyQVJhcZGhsdETFDOB4SI0wUJjcvAWU/Ej/9oADAMBAAIRAxEAPwD1EmQdRAExDBJiGATApIEmBVgC0BgkwHYEmBVgS0Q7AloDsaLQHY1nQHY1nQCxrOgFjM6AWN50AsZnQCxvOgKwQaArGw0BWCDQFYIGMVggYCsGDAkMGAmggYEhgxiCBgSFjGIWTEUCTEUATAaQBMCgCYFWBJiHYAmBVgSYDsCWgVYEtAdgcYBY6KVhrPvab85GaOsx2ZnKvSjrJHSlx1zrCrzt3Yx5WYvG0lxY0ZP1ePT/AJu6PKR8/T4Mw5PVePT/AJu6GUPn4cGLe4641BG5m78IsrLWNpPijlq2Csm+pvzgZw7IrM1jXpS0kjnxiNrGw0BWCDQFYIGArBAwJsGDAQQMZNgwYCDBgS0GDAkMGAjeMYrAExDAJgUkATAsAmA7AEwKsATEUkAWgVYAtAdh1lsdWrvFJHGOhR0xpXM6laFPnMmbLk+o01WLHiroHXrPZLUTwVMfJ8xWJWhZKdPeIq8oGnr1x2PHOrOfOdx0ZmZADIAZADIAZABNey06m/RW5xp64rFwqThzXYi7Vk+h002KnY26XvHbE4nsp4+S56uQ1rsNWjv10cYaV65DVjoU68KnNZzgxGlgw0BWDBgS0GDAkMGMVgwYEhgwJaDBgSFjAQsmBSAJgUATApCyYigCYFJAEwKMpozsFUFmOoCMJSUVeTsieu+4lXBq26PEG9HPtlqPE5lbHN7qe5cekmVUAYAAAagNAEo8Ld97NwEcdrvOhS0PUXHijdN1CK6N6eGq1ObEiq+VCD9XTY8rkL2DGLMeyGzJPnSt3bzhqZTVzqFNfskntMnMz0x2bSWrbENlBafKAcyJ3QzM0WAodXzZgygtPlAedE7oZmDwFDq+bH08pq41im32SD2GGZmctm0no2jtoZUr/wAlNhyowbsOEeY889mS/pl4krZL1oVdC1BifqtuW6jrlJo8VTDVafOidsZgaIB0HSDwGAEPeFxK2LUsEbi/VPdJcT30cbKO6e9eZX61NkYq4KsOAyDpxlGavF3RgMQ7BgwJaDBgSGDGS0MUwJDBgS0FjAVgCYFIWxgUgCYikLJgUkAxgUNsVjes2auob5jqUf5wRpXIq1o0o3ZarDYUorgo0nfMdbf5smiVji1q0qrvI6YzIjbyvmlQxGOe/EU6uc8ETlY9VDCVKu/RcSs2++q1XEZ2YvFTR1nWZDbZ16OCpU+i77SNLST12BLQHY1nQHY1nQCxmdALGZ0AsbDQFYINALEjYL5rUcAGzl4j6R0cIlJtHkrYOlU3tWfFFnu2+6VbBd5UP1WOvzTwy1K5yK+DqUt+q4+5JxnkOa22JKy5rjmYb5eaJq5rSrSpO8Sp22zGi5QkHDSCNnBiOAzNqx26NVVYZkKBiLYwGBLQamBAwGMTQxTAkLGArC2MBgEwKQtjEUkLYwLQ2w2Nqz5q6ANLNwKO+NK5nWrRpRuy22WzLSUIgwA6ydp5ZqlY4lSpKpLNIa7AAkkAAYkk4ACBKTbsirXvlAWxSgSq6jU1M3NsHbIcuB18NgFH9VTe+HuV8tIOpYAtAqwJaA0gC0CrGs6A7Gs6AWMzoBY3nQCxsNAVgg0BWCDQJsGGgKxP3PlAyYJWJZNQfWy8+0dstSOZicApfqp7nwJS9r6SmoFIh3cYgg4hQfrHujcjx4bByqSvNWSKuahJJJJJOJJ1kyDsZUlZBrt4NsQmGpgSximBDQxTAljFMZLCxgIAmBSFsYikLYwKRqlSZ2CKMWY4CMJSUIuT0Rb7BZFooEXXrZuFjtmiVjh1qrqyzMe7hQWJAAGJJ1AbYzNJt2RTr7vg1zmriKQOgai52numbdzu4TCKks0ud6EOzST3pEh8wWs6RS16f1lPvlZWeX57Dr+ryfsCcnrZ5L8Sn3wysfz+H63k/YE5O2zyX4lP+6GVj5Qw/W8n7GvFy2eS/Ep/3QysfKGG63k/YHxctvkfxKX90MrHyhhut5P2M8W7b5H8Sl/dDKw5Qw3W8n7GvFu2+R/Epf3QysOUcN1vJ+xvxbtvkfxKX90MrDlDDdbyfsDWuG1orO1LBUUsx8JTOAAxJ0GGVjjjsPKSipb32P2I0NJPXYMNAmwYaAmgw0CWhimBJI3VYHrtgNCjfvwDkHLKSueXE140Y3evQi2VLtpGj4EDBRqPCG43PLtuscSOImqnxL7/APdxU69FqblG0FT0HlHJM2duE1OKkjSmIBqmBLGKYyGFjAVgGMCkLYxFIUxgWixZP2HMXwrDdVBueRPz7ppFHKxtbNLItF6kxKPCVTKS9c9jRQ7hTuyPrMODmEiTO1gcLlXxJavTsK+xkHTSFOYFpHptHer5o9k2PkZasOBJkAMgBkAMgBkAMgBxX19FtHoavuGJm+F+vDvXqeYhpkfXtBhoEtBhoE2GK0CWhimBLRPZN3p4JvBOf0bnQeK23mMqLObjsN8RZ46rzRb5ocMib/sPhE8Io3dMda8I6NfXJkj24Ovkllej9StKZmddjFMCGMUwIYeMBAMYFC2MC0Ouyy+Gqqv1Rum80d+qUldmWIq/Dpt9PQXECaHCIrKC8PA0sFP6SpiF2gcLf5tkydj2YKh8Wd3oilMZmfQCmMC0hTmBaR6jR3q+aPZNj4+XOZFZUXhUs1BXpEBjUVdIxGBDH4RN2PZs/Dwr1XGelvYqhyutfGp+rEjMzs8lYfg/EE5X2zjU/ViGZj5Jw/B+JrxwtnGp+rHfDMx8k4fg/E1442zjU/VjvjzMfJGG4PxM8cbZxqfqx3wzMOSMPwfib8cbZxqfqx3xZmLknD8H4gV8qrVURqbFM2orI2CAHAjAwzMqGzKEJKSTut+pEBpJ7g1aAmhimBDQxTAkapgQ0MUwIZdMm7w8LTzGO7pYA7WXgPwmkXc4GOw/w55loyYlHhKfe1k8DVIG9bdLzHg6DM2rM7uGq/EppvVanMpkmzGKYEMPGBIDQKQtjAtFiycs2bTNQ66h0eaNA7cZpFHJx1TNPLwJeUeIod823w1Zn+qNynmjh6dfTMm7s+jwtH4VNR6ekjmMR60KYwLQmodBgWj1WhvV80eybHxsucyvZefRV9MnuvJlodPY/wBd9z9Uefs0g+mSL1YMkbLUo0nY1c56aMcHGGJUE8EvKj52ttWvCpKKtubWg7xKsm2t6wd0MqM+WMR2eH5M8SbHtresHdDKg5ZxHZ4fk14k2TbW9YO6GVD5ZxHZ4fk34lWTbW9YO6GVC5YxHZ4fk02RNl4GrD7an2rDKhrbFfpS8PycNqyHOujX5lqL/UvdFlPRT2114eD/AIfuV68Lqr2Y/pUIB0BxpQ9PwMlqx1KGKpV1+h/bpOZTEbNDFMDNoapgSxqmBDJC6bZ4Gqr8GODcqnX39Eadjy4mj8Wm4+HeX4HHSNRmp80ReUVmz6WeNdI4/ZOv4HokyW49mBqZamXoZWVMzOwxqmBDCxgSCxgUgApYhRrYgDnOiMpuyuy7UaYRVUalAA6JqfPSk5SbfScN/wBp8FZ3I3z7hec6+zGJvcejB0/iVUuhbyjMZkfRIUxgWhLGBaE1DoMDSJ6xQ3i+avsmx8XPnMruXx/2q+mT3Xky0Opsf677n6o87YyD6hI9duf6NQ9DS90TRHxGJ+tPvfqdNasqDOdlVR9ZmCjrMZlGMpO0VdnP852fy9H1qd8Lmny9XqPwZnznZ/L0fWp3xXD5et1H4Mz5zs/l6PrU747h8vW6j8GHTt1FtC1aTH92op9hgTKjUjrFr7HRAzBq01dSrAMrDAqRiCOUQHGTi7p2ZQcp7g/0x8LSxNFjgRrNNtnMeCZyVj6XZ+O+Osk+cvP8kGpknRaGqYGbHKYEsapgZsvGTlp8JZ1B109weYauzCaRe4+ex1PJWfbvJKogYFTqYEHmMo8ibTuij1KZRmU61JU9BwmR9FGWaKkukJYhMOBNgWgNHTc1LOtCbFJY9A0duEqOpjipZaT8C3TQ4hWMr6+6p09gLnp0D2GRI6+zIbpS+xWmMg6yFMYGiEsYFITUOgwNYnrVDeL5q+ybHxM+cyufKD9EX06e68mWh1NjfuH/AIv1R5wxkH1SPYbm+jWf0NL3BNEfDYr60+9+pEfKB9AqefR98QZ7djfu49z9GeVkyT7I1jAYQMBBiIlkrdV+WizEGnUbNGumxLUyNmHB0YQTseLEYKjXX647+K1/3vPTbivZLXRFRdBG5qJjiUbZyjYZadz5LF4WWHqZH9nxR12yzLVpvTcYrUUqenh54zCnUdOanHVHlVWkabsjb6mzKecHAzI+zjJTipLR7wlMQmOUwIY1TAzZZMkK+FSpT46hhzqfz7JcTlbTheEZcC1SzjFSv2lm2hv3wrdmB7QZnLU7eDlmors3HGsk9DDgSC0BolMmUxqO3FTDrP5S4nix7/Ql2lklnKKVlLUzrS/7oVewH4mZy1PoMBG1FdtyHaSe5CWgWhLQLQmodBgaxPW6G8XzV9k2PiJ85nNe12U7VTFOrnZoYPuTgcQCPiYmrm2GxM8PPPDW1iHORFi/i+s/KLKj3cs4ns8Cw2aiKaJTXHNpqqLjpOAGAlHLnNzk5PV7znva7adqpGjVzsxipOac04qcRp6IGuHxE8PUVSGqILxCsP8AG9b+UVjo8uYrs8DPEKw/xvW/lCwcuYrs8DfiHYf43rfyhYXLeK7PA88vWgtK0VqSY5tKq6LicTgCQMTJPqMNN1KMJy1aTEqYjRouPycViK9anwNSDnnVgB75jicHbkF8KMulO3ivwegSz5o8yykGFsrgccHrUE+2Zy1PrsA74aHd/JwrJPQxywM2OWBDJXJ2pm2mnykqekH8pUdTxY2N6Mi9TQ+dK7lQm7pttVh1H85EjqbPf6ZIh1kHvYcBGmgCJrJcfrT5n9UuJz9oPm/f+CelnNKFfLY2it6Rh1aJk9T6TCq1GHcRzRHqQpoGiEvAtCKmo80DRHrlDeL5q+ybHxE+czK9oSmM6o6oMcMXYKMdmJgEISm7RV+45/nWzftFD11Pvhc1+WrdR+DOtGDAEEEEAgg4gg6iDAxaadmBXrpTXOqOqKMMWdgq6dWkwHCEpu0Vd9hy/PFk/abP6+n3wubfKV/+uXgzPniyftNn9fT74XD5Sv8A9cvBm/ney/tNn9fT74XF8rX/AOuXgzyK/aga12llIZWr1SGBBBGccCDIZ9vg4tYemmrOyOZYjZl8+TixH9NaCNBApIdunFv6e2VE+b25WX6aS73/AB/Jd5R8+eVXvaBUtNZxqao2B2gHAHqEyep9lhYZKMIvgJWI0Y1YEMcsCGd91NhXon+LT94RrU82IV6Uu5noM1PmCCypG5pHlYdg7pEjo7P1kQSyDpMOAgWgCJvJf/l+x/VLgc/aH9P3/gnpZzSg3uP09b0j+2ZPU+lw30odyI9oj0oS8DRCXgWhNTUeaBoj1yhvF81fZNj4ifOZW/lE+iJ6dPdeTLQ6uxf3D/xfqjzVxJR9Yj2W5fotn9BS9wTRHweK+vP/ACfqRHyg0me76iqrMxejuVUsd+OAQPbsaSji4uTtuevczylrur+Qr+pqd0k+0WIpddeK9zQu2v5Cv6ip3QG8RS668V7jFu6v5Ct6mp3QIeIpddeKOqz3TaXOC2euf+mph14YRGM8VQirupHxRZblyHr1CGtP6GnwqCGqtyaNC8/ZHY5OK21SgmqX6nx6Pyeh2WzJSRadNQqIMFUcAlHzFSpKpJzk7tkTlVews1AhT+lrArTHCNr9HtwibsezZ+Fderv5q3v2+55wkyPq2OSBmxywIY5YEM7rsGNal6Wn7wjWp5sQ/wD5S7n6HoU1PmCDypO5p+c3skyOjs/nSIFZmdJhwEaaAIlsmG3dQbVB6j+cuJ4doL9MWWKWcso+UKYWmrylT1qJnLU+hwUr0I/70kS0k9qFNA0QloFoRU1GBpE9cobxfNX2TY+InzmVv5Q/oienT3Xky0OrsX9w/wDF+qPN3Ek+rR7Hcv0Wz+gpe4Joj4TFfXn3v1O2BgZADIAZADIAZAAamdmnNwzsDm52OGPBjhwQGrX36HmGUNlta1i9qGLPvXXTTIGpV2Dk1zN3PrsDUw8qeWj0dHT9/cj1knrY5YGbHLAhjlgZsk7iTOtNIbGx6gT8JS1PJjJWoyL5ND5sr+VLaaS7A59kiR09nLdJ9xCrIOgw4CMaAI7LhqZtoUccMvZj8JUdTz4yN6T7C1zQ4pVMrqOFVH46YdKn8xIkdrZs7wceD9SvNIOmhLiBohLiBaE1BoMDSJ61Q3i+avsmx8TPnMrnyg/RE9OnuvJlodXYv7h/4v1R5wwkH1SPYrm+jWf0NL3BNUfC4r60+9+onKG9P9JZ2r5nhM1kGbnZuOcwGvA7YF4LDfM1lTva99+uiKp/9FP7L+P/AOJNztf8f/u+X5M/+in9k/H/APELh/x/+75fk2PlEP7KPX/+IXFyB/d8vyGnyhbbLo5K2P8ATDMS9g8Knl+SQsmXNlfRUSrS5Sodf5dPZDMjzVNi1481qXl6+5YrJa6dZc+k6up4VOPQdhlHLqUp05ZZqzCtVmSqhp1FDIwwIP8AmgwFTqSpyUouzR5tfl1NZaxTSUbdU2PCuw8o/wA1zJqx9XhMUsRTzdK1ONREbscsCGOWBDJ/JKjjWLcFND1nQOzGVHU5m0p2pqPFlvmhwyrZRVM6vhxFUdOv4iZy1OzgY2pX4sj1knqYeECbmmgCMo1Mx1fiMG6jGgnHNFx4l2U4jEajpE1PnmrERlPZs+hnDXSYN9nUfbj0SZaHu2fUy1bcdxTGEzO8hTCBohTCBaEVBoMC4s9ZobxfNX2TY+LnzmV3L8f7VfTJ7ryZaHU2N+4fc/VHnTrIPqUz165/o1D0NL3BNEfD4n60+9+pE5fD/YVPPpe+IPQ9ux/3ce5+jPLikg+vuZmwHc2EgK4YWIm4xVgSyQum8KtmqCpTPnL9V14p/wA0Rp2PNicPCvDLNdz4HqtktC1aaVF3tRQw5iNU0PjKlN05uD1W4iMsbIKlmL4bqiQwPITgw6jj0SZaHu2ZVcK6j0S3exRVEzPo2NQQIY1RAhlyyUs2bRLnXVbH7I0DtxmkVuODtGpmqZeBNmUc8pFqq+EqO/GYkc3B2TJn0NOGSCjwNLENhwJuY0AQphAtFpuK0Z9FRw09wejV2YTWL3HGxdPJVfbvO+ogZSp0hgQRyGM8ybTTR59brMaVRqZ1ocOccB6pkz6elUVSCkuk5GERshTCBaE1BoMDRM9Wob1fNHsmx8ZLnMOBJrAQA3ADIAawEAuZgIBczAQAVagPBv5jewwLhzl3njqLoEyPupMaqxENnpmSmP8AoqOOxurPbCax0Pkto2+Znbs9EdF/fRa/on9kHoZYT68O9HnKiZH1TGqIEs6rJQNR1RdbkAcnLGY1JqEXJ9B6HQpBFVF1IAo5hNT5eUnKTk+k476tHg6LbX3C8519mMUnuNsLTz1V2bypKJkdxjVgQw8IEmMIAhbCBaO64rV4Ormne1dyeRvqn4dMqL3nmxlLPTutUWqaHGK/lVYM5RWUaU0PyrwHo+MmSOns6vlfw306d5VGEzO0hTCBaYp1gWmW1MsKYAHgamgAb5ZeY4b2TNu+deZhy0p+RqfeWPMPkefXXmCctqXkan3lhmHyNPrrzLLZa3hKaVAMBUVWAOsYjHCUcmpDJJx4Oxz3xeIstE1mUsFKjNUgHScOGJuxrhsO69RU07XK/wCPNLyFX7yRZjpci1OuvMzx5peQq/eSGYORanXXmb8eaXkKv3khmDkWp115g1ctaTKy+BqboEb5eERZhx2NNNPOvMparIO+2dl22B69QU6YxJ1ngUcLHkjSuYV68KMHOX/p6jZLOtKmlNd7TUKOga5qfH1JupNzerIrK20BLMy8NUqg5scT2Dtky0PZs2nmrp8N5R1EzPomxqiBDLVkpYMAa7DXitPm4W+HXLiuk420a938Nfcscs5RV8obVn1cwb2lo52Ovu65nJnYwVLLDM9X6EaoknrY1RAhhQEbYQEhbCBaFkQKRbLotvhqYJ36bl+fgPTNU7nExNH4c+x6HaygggjEEYEHURsjME7b0Ue+rtNCpgMfBtiUPJxTyiZtWPocJiFWh2rUjGEk9aYphAtMWRAq4BWBSYtlgWmepXV9Hoeip+6Jsj47EfVn3v1OfKC72tNnakhVWZkOLY4aCDwRNXNMHXVCqpyV0rlW8Sa/laP8/dJynZ5ZpdV+XuZ4kV/K0f5+6GUOWaXVfl7meJNfylH+fuhlDlml1X5e5sZFV/K0v5+6GUXLNLqvyO2y5FKDjVrEjZTUL2nH2QymFTbL/ohbvLJYLBSoLmUkCjhOssdpOsykrHJrV6laWabudDsFBJIAAxJJwAG2MzSbdkUK/ry/1NXFf1dPFafLtbp+Ambdz6TBYf4FPfq9fYj1Ek9LZJXPdxr1AukIul22DZzmUlc8uKxCowv09BeqaBQFUYBQAANQA4JofONtu7OW9bYKNMt9Y6EHLt6Im7G2Ho/Fnbo6SnjTpOs65kd0YogSxqiBDCwgI2RGJC2ERSFsIFodd9rNGoHGkamG1e+NOxnWpKrDL4FvpVA6hlOKsMQZqcKUXF2epD5TWymKZpEBnbAgcT97n5JMme/AUZuedbkvPsKiwmZ3BbCBSYBWBSYsrAq4DLAdz026/wBRR9FT90TZHyWI+rPvfqdUDEyAGQAyAGQAyAEdbr7s9HW4ZuIm6buHTE2j1UsHWq6RsuL3FUve+6lp3O8pcQHXyseHmkN3O1hsFChv1lx9iNUST1NnXYLE9ZwiDSdZ4FG0xpXMK1aNKOaRervsSUECJzs3Cx2maJWPna1aVWWaQ+o4UFmOAUYkngEZmk27Ip95W016md9UaEGwbeczJu53cPRVKFunpEKIjVjFECGxiiBLCjJCYQAWwiKFsIFJi2ECkdVivOpRVlXAht7j9Vto7pSdjGthoVZJv/0jqhLEkkkk4knWTEeqKUVZaHRdt2vXfAaFG/fgA2c8ErmdfExoxu9ehAXpddSg26GKHeuNR5DsMbVh4fEwrLdrwI4rJPUmAVgUmCVgVc6lvO0qABWqAKAAAxwAGoR3Zg8NRbu4Iz52tXl6v3zC7D5Sh1EZ87Wry9X7xhdh8pQ6iNfO1q8vV+8YXYfKUOojfztavL1fvGF2HylDqIz51tPl6v3zC7D5Wh1EKq2iq+/qVG852PtMLlxpwjzYpfYWFiLuGFgS2d92XZUrtgowUb5zvR3nkjSuebEYmFFb9eBdLvsKUEzUHnMdbHaZolY4FatKrLNI6SYzErF9Xn4U+DQ/o1Ok8c90zkzsYTDfDWaWvoRiiSetjFECWxiiBLGARkMLCAgmEBCyIFIBhEULIgWmLYQKTNIgLAMc1SRiQMSBtwjCTaTtvZdLFSppTUUsMzDEEaceXHhM0RwKspym3PUbUphgVYAqdBBGIMZCk4u63FcvLJvW1A/9bH3T39chx4HVobR6Kvj7ldrUGQlXUqw4CMDJOpCakrxd0KKxF3BKwHc1mwHc1mwHczNgFzebAVzYWAXNhYCuNo0WYhVBZjqAGJjIlNRV27IsN2ZNE4NXOA8mp0nnPB0SlHicuvtFaU/EslKkqKFUBVGoAYASzlSk5O7d2bdwoJJAA0knQBASTbsitXvexq4pTxFPhOov3CZuR1sNhFT/AFT19CLAkntbGKIEthqIENjAIyWMUQJYWEBBEQEmLYQKAIgUhbCIoAiBSYBECrnRYLwqUDudKnWh1HlGwxp2Ma2HhVW/XiWaw3hTrDcnBuFDoYd80TucirQnSe/TidcZiKtFmp1Bm1FVhyjVzbIFwqSg7xdiFteTCHTScp+6wzh16x2yXE6FPaU1umr+RE2jJ+0LqUONqMPYcDJys9kMfRlq7d5w1bFVXfU6g50bCKx6Y1qctJLxEFYjS5gWAXHUrFVbe06h5kYx2M5VoR1kl9zuoZP2htaBBtdgOwaY8rPPPH0Y9N+4lrJkug01XLfuqM0des9kpRPFU2lJ7oK3eTVmstOkMKaKo5BpPOeGVY8FSrOo7ydx0DM5bbb6dEYudPAo0seiJuxtSoTqv9KKzeF41K507lBqQauc7TIbudehh4UtN74nIBJNrjFEBNhgQIbGARksNRAkMCAmFhAkIiAgCIFJgMIFAEQKTFsIhgkQKTAKwKuCMQcQSCNRGgiA9z3MlbFfrpoqDPG0aHHwMtSPFVwMZb4bvQmrLeNKrvXGPFbQ3Vwyk0zn1MPUp85HXGYmQAyAGiIAYBADcAMgBkAOW1XhSpb9xjxRpbqETaRtToVKnNRC2y/nbRSGYOMdLdw7ZLkdClgYx3zd/QiGJJJJJJ1knEmSe1WSsggIguEBAlsMCBLYwCBNwgIxMYBAlhgQJYWECQiIAARAYBECkwCIFAEQHcAiIq4JECkwCsB3BKwHcErAq500LwrU97UbDYd0O2O7MZ4elPWJ30soag3yI3MSp+MrMeaWAg+bJo6Uyip/WRxzZp7o8xi9nz6JIaL/AKGxx9kd8MyI+Rq9hhv+h+/90d8MyD5Gr2Cnyip/VRzz5o+MMxa2fPpaOarlDUO8RV84lu6LMbR2fFc6Vzgr3jWqb6o2GxdyOyTdnphh6UNInMFiNrmwsBXCCwFcMCBLYQWArhgRk3DAgSGBAVwwIEthgQJN4R2EERAQJERQBEB3AIgUmCRAoAiA7gkQHcErEO4JECrglYDuCVgO5rNgFzWbAdzM2AXMzYBczNgFzebALmwsBXNhYCuEFgK4QWArhBYCuEBGTcMCAggICbDAgTcMCBIQEYgsIxGzASAMRSBMQwDAoEwGgDAoEwGgTEMEwGCYDNGA0aMBmoDMgBkAMgBuAG4Es2ICNiAghATCEYghAQYgIIQJDECQhGhBiCEFGI//2Q==" class="profilepic me-2" alt="EverBilena">
            <span>EverBilena</span>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
