<?php
    function getAge($birth_date) {
        $bday = new DateTime($birth_date);
        $today = new Datetime(date('m.d.y'));
        if($bday > $today) {
            return 'შენ არ ხარ დაბადებული ჯერ :)';
        }
        $diff = $today->diff($bday);
        $age = $diff->y;
        return $age;
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $age = getAge($birth_date);
    $gender = $_POST['gender'];

    function personCategorization($age, $gender) {
        if($age < 18) {
            return 'არასრულწლოვანი';
        } else if($age > 18 && $age < 60 && $gender == 'female') {
            return 'შრომის უნარიანი ქალი';
        } else if($age > 18 && $age < 65 && $gender == 'male') {
            return 'შრომის უნარიანი კაცი';
        } else if($age > 60 && $gender == 'female') {
            return 'პენსიაზე გასული ქალი';
        } else if($age > 65 && $gender == 'male') {
            return 'პენსიაზე გასული კაცი';
        } else {
            return 'ადამიანის კატეგორიზაცია ვერ მოხერხდა';
        }
    }

    $errors = [
        'first_name' => '',
        'last_name' => '',
        'birth_date' => '',
        'gender' => '',
    ];

    // Validations
    // First Name
    if(isset($first_name) && !$first_name) {
        $errors['first_name'] = 'სახელის ველის შეყვანა აუცილებელია';
    } else if(isset($first_name) && $first_name && strlen($first_name) > 15) {
        $errors['first_name'] = 'სახელის რაოდენობა არ უნდა აღემატებოდეს 15 ასოს';
    }
    // Last Name
    if(isset($last_name) && !$last_name) {
        $errors['last_name'] = 'გვარის ველის შეყვანა აუცილებელია';
    } else if(isset($last_name) && $last_name && strlen($last_name) > 25) {
        $errors['last_name'] = 'გვარის რაოდენობა არ უნდა აღემატებოდეს 25 ასოს';
    }
    // Birth date
    if(isset($birth_date) && !$birth_date) {
        $errors['birth_date'] = 'დაბადების თარიღის ველის შევსება აუცილებელია';
    }
    // Gender
    if($_SERVER['REQUEST_METHOD'] == 'POST' && (!isset($gender) || !$gender)) {
        $errors['gender'] = 'სქესის ველის შევსება აუცილებელია';
    }

    $full_name = $first_name . ' ' . $last_name;
    $person_array = [
        'Full Name' => $full_name,
        'Age' => $age,
        'Gender' => $gender,
    ]
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Forms</title>
        <style>
            form {
                max-width: 300px;
                margin: auto;
                display: flex;
                flex-direction: column;
            }
            .form-group {
                display: flex;
                flex-direction: column;
                margin-bottom: 10px;
            }
            .form-group :not(input[type="submit"]) {
                width: 100%;
                height: 30px;
            }
            input[type='submit'] {
                width: 50%;
                height: 25px;
                margin: 15px 0;
            }
            .error {
                color: red;
                margin: 0;
                font-size: 14px;
            }
            table {
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <label for="first_name">სახელი</label>
                <input type="text" name="first_name" id="first_name"
                       value="<?php isset($first_name) ? print $first_name : '' ?>">
                <?php print !empty($errors['first_name']) ? "<p class='error'>" .$errors['first_name'] : '' ?>
            </div>
            <div class="form-group">
                <label for="last_name">გვარი</label>
                <input type="text" name="last_name" id="last_name"
                       value="<?php isset($last_name) ? print $last_name : '' ?>">
                <?php print !empty($errors['last_name']) ? "<p class='error'>" .$errors['last_name'] : '' ?>
            </div>
            <div class="form-group">
                <label for="birth_date">დაბადების თარიღი</label>
                <input type="date" name="birth_date" id="birth_date"
                       value="<?php isset($birth_date) ? print $birth_date : '' ?>">
                <?php print !empty($errors['birth_date']) ? "<p class='error'>" .$errors['birth_date'] : '' ?>
            </div>
            <div>
                <input type="radio" name="gender" id="male_gender" value="male"
                    <?php isset($gender) && $gender == 'male' ? 'checked' : '' ?>> კაცი
                <input type="radio" name="gender" id="female_gender" value="female"
                    <?php isset($gender) && $gender == 'female' ? 'checked' : '' ?>> ქალი
                <?php print !empty($errors['gender']) ? "<p class='error'>" .$errors['gender'] : '' ?>
            </div>
            <input type="submit" value="გაგზავნა">
            <?php print "კატეგორიზაციის შედეგი: " .personCategorization($age, $gender) ?>
            <table border="1">
                <tr>
                    <?php foreach($person_array as $key => $value) {
                        print "<th>$key</th>";
                        print "<td>$value</td>";
                    } ?>
                </tr>
            </table>
        </form>
    </body>
</html>