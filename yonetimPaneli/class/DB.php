<?php

class DB
{

    var $host = "localhost";
    var $user = "root";
    var $db = "yonetimpaneli";
    var $password = "";

    var $conn;


    //! bu fonksiyon herhangi bir çağırma işlemi gerçekleşmeden otomatik olarak çalışır.
    public function __construct()
    {
        //try catch kontrol içindir. Veritabanı bağlantısı eğer başarılı olursa bağlantı sağlanır. Başarısız olursa ekrana hata mesajı döner
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //veritabanı soegusunda istenilen tablodaki verileri çekip getirmek için kullanılır.
    public function getAll($table, $wherespace = "", $whereArrayValue = array(), $orderBy = "ORDER BY ID ASC", $limit = "")
    {
        // Karakter seti ayarlama
        $this->conn->query("SET CHARACTER SET utf8");

        // SQL sorgusunu oluşturuyoruz
        $sql = "SELECT * FROM `" . $table . "`";

        // Eğer where koşulu varsa ekliyoruz
        if (!empty($wherespace) && !empty($whereArrayValue)) {
            $sql .= " " . $wherespace; // Where koşulunu ekliyoruz
        }

        // Eğer orderBy varsa ekliyoruz
        if (!empty($orderBy)) {
            $sql .= " " . $orderBy;
        }

        // Eğer limit varsa ekliyoruz
        if (!empty($limit)) {
            $sql .= " LIMIT " . $limit;
        }

        // Veritabanı sorgusunu çalıştırma
        if (!empty($wherespace) && !empty($whereArrayValue)) {
            // Prepared statement kullanarak where parametrelerini bağlayıp çalıştırıyoruz
            $worker = $this->conn->prepare($sql);
            $worker->execute($whereArrayValue);
            $data = $worker->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Direkt olarak sorguyu çalıştırıyoruz
            $data = $this->conn->query($sql, PDO::FETCH_ASSOC);
        }

        // Eğer veri varsa sonuçları döndürüyoruz
        if ($data !== false && !empty($data)) {
            $datas = array();
            foreach ($data as $information) {
                $datas[] = $information;
            }
            return $datas;
        } else {
            return false;
        }
    }
    public function SqlWork($sql, $valueArray = array(), $limit = "")
    {
        $this->conn->query("SET CHARACTER SET utf8");

        try {
            // Eğer değerler varsa, prepare ve execute kullan
            if (!empty($valueArray)) {
                if (!empty($limit)) {
                    $sql .= " LIMIT " . $limit;
                }

                // Sorguyu hazırla ve çalıştır
                $work = $this->conn->prepare($sql);
                $result = $work->execute($valueArray);
            } else {
                // Değer yoksa doğrudan exec kullan
                if (!empty($limit)) {
                    $sql .= " LIMIT " . $limit;
                }

                $result = $this->conn->exec($sql);
            }

            return $result !== false;
        } catch (PDOException $e) {
            echo "SQL Error: " . $e->getMessage();
            return false;
        }
    }


    public static function seflink($title, $options = array())
    {
        $str = mb_convert_encoding((string)$title, 'UTF-8', mb_list_encodings());
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true
        );
        $options = array_merge($defaults, $options);
        $char_map = array(
            // Latin
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Å' => 'A',
            'Æ' => 'AE',
            'Ç' => 'C',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ð' => 'D',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ő' => 'O',
            'Ø' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ű' => 'U',
            'Ý' => 'Y',
            'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'æ' => 'ae',
            'ç' => 'c',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ð' => 'd',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ő' => 'o',
            'ø' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ű' => 'u',
            'ý' => 'y',
            'þ' => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A',
            'Β' => 'B',
            'Γ' => 'G',
            'Δ' => 'D',
            'Ε' => 'E',
            'Ζ' => 'Z',
            'Η' => 'H',
            'Θ' => '8',
            'Ι' => 'I',
            'Κ' => 'K',
            'Λ' => 'L',
            'Μ' => 'M',
            'Ν' => 'N',
            'Ξ' => '3',
            'Ο' => 'O',
            'Π' => 'P',
            'Ρ' => 'R',
            'Σ' => 'S',
            'Τ' => 'T',
            'Υ' => 'Y',
            'Φ' => 'F',
            'Χ' => 'X',
            'Ψ' => 'PS',
            'Ω' => 'W',
            'Ά' => 'A',
            'Έ' => 'E',
            'Ί' => 'I',
            'Ό' => 'O',
            'Ύ' => 'Y',
            'Ή' => 'H',
            'Ώ' => 'W',
            'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a',
            'β' => 'b',
            'γ' => 'g',
            'δ' => 'd',
            'ε' => 'e',
            'ζ' => 'z',
            'η' => 'h',
            'θ' => '8',
            'ι' => 'i',
            'κ' => 'k',
            'λ' => 'l',
            'μ' => 'm',
            'ν' => 'n',
            'ξ' => '3',
            'ο' => 'o',
            'π' => 'p',
            'ρ' => 'r',
            'σ' => 's',
            'τ' => 't',
            'υ' => 'y',
            'φ' => 'f',
            'χ' => 'x',
            'ψ' => 'ps',
            'ω' => 'w',
            'ά' => 'a',
            'έ' => 'e',
            'ί' => 'i',
            'ό' => 'o',
            'ύ' => 'y',
            'ή' => 'h',
            'ώ' => 'w',
            'ς' => 's',
            'ϊ' => 'i',
            'ΰ' => 'y',
            'ϋ' => 'y',
            'ΐ' => 'i',
            // Turkish
            'Ş' => 'S',
            'İ' => 'I',
            'Ç' => 'C',
            'Ü' => 'U',
            'Ö' => 'O',
            'Ğ' => 'G',
            'ş' => 's',
            'ı' => 'i',
            'ç' => 'c',
            'ü' => 'u',
            'ö' => 'o',
            'ğ' => 'g',
            // Russian
            'А' => 'A',
            'Б' => 'B',
            'В' => 'V',
            'Г' => 'G',
            'Д' => 'D',
            'Е' => 'E',
            'Ё' => 'Yo',
            'Ж' => 'Zh',
            'З' => 'Z',
            'И' => 'I',
            'Й' => 'J',
            'К' => 'K',
            'Л' => 'L',
            'М' => 'M',
            'Н' => 'N',
            'О' => 'O',
            'П' => 'P',
            'Р' => 'R',
            'С' => 'S',
            'Т' => 'T',
            'У' => 'U',
            'Ф' => 'F',
            'Х' => 'H',
            'Ц' => 'C',
            'Ч' => 'Ch',
            'Ш' => 'Sh',
            'Щ' => 'Sh',
            'Ъ' => '',
            'Ы' => 'Y',
            'Ь' => '',
            'Э' => 'E',
            'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'yo',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'j',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'sh',
            'ъ' => '',
            'ы' => 'y',
            'ь' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye',
            'І' => 'I',
            'Ї' => 'Yi',
            'Ґ' => 'G',
            'є' => 'ye',
            'і' => 'i',
            'ї' => 'yi',
            'ґ' => 'g',
            // Czech
            'Č' => 'C',
            'Ď' => 'D',
            'Ě' => 'E',
            'Ň' => 'N',
            'Ř' => 'R',
            'Š' => 'S',
            'Ť' => 'T',
            'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c',
            'ď' => 'd',
            'ě' => 'e',
            'ň' => 'n',
            'ř' => 'r',
            'š' => 's',
            'ť' => 't',
            'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A',
            'Ć' => 'C',
            'Ę' => 'e',
            'Ł' => 'L',
            'Ń' => 'N',
            'Ó' => 'o',
            'Ś' => 'S',
            'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a',
            'ć' => 'c',
            'ę' => 'e',
            'ł' => 'l',
            'ń' => 'n',
            'ó' => 'o',
            'ś' => 's',
            'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A',
            'Č' => 'C',
            'Ē' => 'E',
            'Ģ' => 'G',
            'Ī' => 'i',
            'Ķ' => 'k',
            'Ļ' => 'L',
            'Ņ' => 'N',
            'Š' => 'S',
            'Ū' => 'u',
            'Ž' => 'Z',
            'ā' => 'a',
            'č' => 'c',
            'ē' => 'e',
            'ģ' => 'g',
            'ī' => 'i',
            'ķ' => 'k',
            'ļ' => 'l',
            'ņ' => 'n',
            'š' => 's',
            'ū' => 'u',
            'ž' => 'z',
            // Arabic
            'ء' => 'e',
            'ا' => 'e',
            'أ' => 'e',
            'إ' => 'i',
            'آ' => 'e',
            'ؤ' => 'v',
            'ئ' => 'ke',
            'ب' => 'b',
            'ت' => 't',
            'ث' => 's',
            'ج' => 'c',
            'ح' => 'h',
            'خ' => 'h',
            'د' => 'd',
            'ذ' => 'z',
            'ر' => 'r',
            'ز' => 'z',
            'س' => 's',
            'ش' => 's',
            'ص' => 's',
            'ض' => 'd',
            'ط' => 'b',
            'ظ' => 't',
            'ع' => 'a',
            'غ' => 'g',
            'ف' => 'f',
            'ق' => 'g',
            'ك' => 'k',
            'ل' => 'l',
            'م' => 'm',
            'ن' => 'n',
            'ه' => 'h',
            'و' => 'v',
            'ي' => 'y',
            'ة' => 't',
            'ى' => 'k'
        );
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        $str = trim($str, $options['delimiter']);
        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }
    public function moduleAdd()
    {
        if (!empty($_POST["title"])) {
            $title = $_POST["title"];
            if (!empty($_POST["state"])) {
                $state = 1;
            } else {
                $state = 2;
            }
            $table = str_replace("-", "", $this->seflink($title));
            $control = $this->getAll("modules", "WHERE `tables`=?", array($table), "ORDER BY ID ASC", 1); // table'ı tırnak içine aldık
            if ($control) {
                return false;
            } else {
                $tableAdd = $this->SqlWork('CREATE TABLE `' . $table . '` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `seflink` varchar(255) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `texts` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `clef` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` int(5) DEFAULT NULL,
  `orderno` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;');
                $moduleAdd = $this->SqlWork(
                    "INSERT INTO modules (title, `tables`, state, date) VALUES (?, ?, ?, ?)",
                    array($title, $table, $state, date("Y-m-d"))
                );

                $categoriesAdd = $this->SqlWork(
                    "INSERT INTO categories (title, seflink, `tables`, state, date) VALUES (?, ?, ?, ?, ?)",
                    array($title, $this->seflink($title), 'modul', 1, date("Y-m-d"))
                );

                if ($moduleAdd) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    public function filter($val, $tf = false)
    {
        if ($tf == false) $val = strip_tags($val);
        $val = addslashes(trim($val)); //sql komutunu güvenilir bir yapıya alır.trim ileise sağ ve soldaki boşluklar temizlenir
        return $val;
    }

    public function uzanti($dosyaadi)
    {
        $parca = explode(".", $dosyaadi);
        $uzanti = end($parca);
        $donustur = strtolower($uzanti);
        return $donustur;
    }

    public function upload($nesnename, $yuklenecekyer = 'images/', $tur = 'img', $w = '', $h = '', $resimyazisi = '')
    {
        if ($tur == "img") {
            if (!empty($_FILES[$nesnename]["name"])) {
                $dosyanizinadi = $_FILES[$nesnename]["name"];
                $tmp_name = $_FILES[$nesnename]["tmp_name"];
                $uzanti = $this->uzanti($dosyanizinadi);
                if ($uzanti == "png" || $uzanti == "jpg" || $uzanti == "jpeg" || $uzanti == "gif") {
                    $classIMG = new upload($_FILES[$nesnename]);
                    if ($classIMG->uploaded) {
                        if (!empty($w)) {
                            if (!empty($h)) {
                                $classIMG->image_resize = true;
                                $classIMG->image_x = $w;
                                $classIMG->image_y = $h;
                            } else {
                                if ($classIMG->image_src_x > $w) {
                                    $classIMG->image_resize = true;
                                    $classIMG->image_ratio_y = true;
                                    $classIMG->image_x = $w;
                                }
                            }
                        } else if (!empty($h)) {
                            if ($classIMG->image_src_y > $h) {
                                $classIMG->image_resize = true;
                                $classIMG->image_ratio_x = true;
                                $classIMG->image_y = $h;
                            }
                        }

                        if (!empty($resimyazisi)) {
                            $classIMG->image_text = $resimyazisi;

                            $classIMG->image_text_direction = 'v';

                            $classIMG->image_text_color = '#FFFFFF';

                            $classIMG->image_text_position = 'BL';
                        }
                        $rand = uniqid(true);
                        $classIMG->file_new_name_body = $rand;
                        $classIMG->Process($yuklenecekyer);
                        if ($classIMG->processed) {
                            $resimadi = $rand . "." . $classIMG->image_src_type;
                            return $resimadi;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else if ($tur == "ds") {

            if (!empty($_FILES[$nesnename]["name"])) {

                $dosyanizinadi = $_FILES[$nesnename]["name"];
                $tmp_name = $_FILES[$nesnename]["tmp_name"];
                $uzanti = $this->uzanti($dosyanizinadi);
                if ($uzanti == "doc" || $uzanti == "docx" || $uzanti == "pdf" || $uzanti == "xlsx" || $uzanti == "xls" || $uzanti == "ppt" || $uzanti == "xml" || $uzanti == "mp4" || $uzanti == "avi" || $uzanti == "mov") {

                    $classIMG = new upload($_FILES[$nesnename]);
                    if ($classIMG->uploaded) {
                        $rand = uniqid(true);
                        $classIMG->file_new_name_body = $rand;
                        $classIMG->Process($yuklenecekyer);
                        if ($classIMG->processed) {
                            $dokuman = $rand . "." . $uzanti;
                            return $dokuman;
                        } else {
                            return false;
                        }
                    }
                }
            }
        } else {
            return false;
        }
    }

    //categorileri çeker
    // Kategorileri çeker ve HTML olarak geri döner
    public function categoryGetAll($table, $selectId = "", $length = -1)
    {
        $length++;
        $html = ''; // Tüm HTML çıktısını toplamak için
        $category = $this->getAll("categories", "WHERE tables=?", array($table), "ORDER BY ID ASC");
        if ($category) {
            for ($i = 0; $i < count($category); $i++) {
                $categorySeflink = $category[$i]["seflink"];
                $categoryId = $category[$i]["id"];
                $isSelected = $selectId == $categoryId ? 'selected="selected"' : '';
                $html .= '<option value="' . htmlspecialchars($categoryId) . '" ' . $isSelected . '>'
                    . str_repeat("&nbsp;&nbspİ&nbsp;", $length)
                    . stripslashes(htmlspecialchars($category[$i]["title"])) . '</option>';

                // Recursive çağrıyı sadece gerekli ise yap
                if ($categorySeflink != $table) {
                    $html .= $this->categoryGetAll($categorySeflink, $selectId, $length);
                }
            }
            return $html; // Toplanan HTML'yi geri döndür
        } else {
            return false;
        }
    }

    // Tek bir kategoriyi çeker ve HTML olarak geri döner
    public function categoryGet($table, $selectId = "", $length = -1)
    {
        $length++;
        $html = ''; // Tüm HTML çıktısını toplamak için
        $category = $this->getAll("categories", "WHERE seflink=? AND tables=?", array($table, "modul"), "ORDER BY ID ASC");
        if ($category) {
            for ($i = 0; $i < count($category); $i++) {
                $categoryId = $category[$i]["id"];
                $isSelected = $selectId == $categoryId ? 'selected="selected"' : '';
                $html .= '<option value="' . htmlspecialchars($categoryId) . '" ' . $isSelected . '>'
                    . str_repeat("&nbsp;&nbspİ&nbsp;", $length)
                    . stripslashes(htmlspecialchars($category[$i]["title"])) . '</option>';
            }
            return $html; // Toplanan HTML'yi geri döndür
        } else {
            return false;
        }
    }
    public function MailGonder($mail, $konu = "", $mesaj)
    {
        $posta = new PHPMailer();
        $posta->CharSet = "UTF-8";
        $posta->isSMTP();                                   // SMTP ile gönderim
        $posta->Host = "smtp.gmail.com";                    // Gmail SMTP sunucusu
        $posta->SMTPAuth = true;                            // SMTP kimlik doğrulamasını aç
        $posta->Username = "ornek@gmail.com";          // SMTP kullanıcı adı (Gmail adresiniz)
        $posta->Password = "uygulama şifresi";                       // SMTP şifresi (Uygulama şifresi olmalı)
        $posta->SMTPSecure = "tls";                         // TLS kullan
        $posta->Port = 587;                                 // Port numarası

        $posta->From = "ornek@gmail.com";               // Gönderen e-posta adresi
        $posta->FromName = "Site Adı";                      // Gönderen adı
        $posta->addAddress($mail);                           // Alıcı adresi
        $posta->Subject = $konu;                            // E-posta konusu
        $posta->Body = $mesaj;                              // E-posta içeriği
        $posta->isHTML(true);                               // HTML formatında gönderim

        if (!$posta->Send()) {
            // Hata mesajını buradan döndürün
            return "Mail gönderme hatası: " . $posta->ErrorInfo;
        } else {
            return true;
        }
    }
}
