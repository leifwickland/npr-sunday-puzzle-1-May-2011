<?php
$colleges = array();
foreach (file('college') as $line) {
    $colleges[trim($line)] = true;
}
$oneLetterElements = 'hbcnofpskvyiwu';
$twoLetterElements = explode(' ', 'he li be ne na mg al si cl ar ca sc ti cr mn fe co ni cu zn ga ge as se br kr rb sr zr nb mo tc ru rh pd ag cd in sn sb te xe cs ba lu hf ta re os ir pt au hg tl pb bi po at rn fr ra lr rf db sg bh hs mt ds rg cn la ce pr nd pm sm eu gd tb dy ho er tm yb ac th pa np pu am cm bk cf es fm md no');

foreach ($colleges as $college => $junk) {
    for ($i = 0; $i < strlen($college); ++$i) {
        $c = $college[$i];
        if (false !== strpos($oneLetterElements, $c)) {
            foreach ($twoLetterElements as $twoLetterElement) {
                $newName = substr($college, 0, $i) . $twoLetterElement . substr($college, $i + 1);
                if (array_key_exists($newName, $colleges)) {
                    echo "$college -> $newName\n";
                }
            }
        }
    }
}
