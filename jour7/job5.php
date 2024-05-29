




<?php
// تعريف الدالة countOccurrences()
function countOccurrences($str, $char) {
    // عداد لتخزين عدد التكرارات
    $count = 0;

    // حلقة للتنقل عبر كل حرف في السلسلة النصية
    for ($i = 0; isset($str[$i]); $i++) {
        // التحقق مما إذا كان الحرف الحالي يطابق الحرف المطلوب
        if ($str[$i] == $char) {
            // زيادة العداد إذا كان الحرف يطابق
            $count++;
        }
    }

    // إرجاع عدد التكرارات
    /*return $count;*/
    echo "عدد تكرارات '$char' في '$str' هو: " . $count . '<br />';
}

// السلسلة النصية
/*$str = "Bonjour";
// الحرف المطلوب البحث عنه
$char = "o";*/

// استدعاء الدالة countOccurrences() وعرض النتيجة
countOccurrences("Bonjour","o");

countOccurrences("Nabucodonozore","o");

?>

