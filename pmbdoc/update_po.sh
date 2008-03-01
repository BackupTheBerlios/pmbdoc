#!/bin/bash
#
# A placer dans le répertoire avec les fichiers po à mettre à jour
for fic in *.po
do
    echo -n Mise à jour de $fic ...
    po4a-updatepo -f docbook -m ~/workspace/pmbdoc/fr_FR/user/${fic%.*}.xml -p ${fic%.*}.po 
done
