AJAX_CHAT
=========

auto login des utilisateurs nk pour Ajax chat : https://github.com/Frug/AJAX-Chat

Il suffit de remplacer les fichiers php et voila le chat fonctionne avec nk ;)

Pour revenenir sur le site quand on clique sur logout il faut mettre $config['logoutData'] = '../index.php'; dans lib/config.php

Pour que les mp fonctionne il faut changer le champ channel (int 11) de la table ajax_chat_messages en bigint 50 ou alors changer les valeur $config['privateChannelDiff'] et $config['privateMessageDiff'] est mettre de plus petite valeur .
