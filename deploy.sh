#!/bin/bash

# Exécuter les migrations de base de données
# L'option --force est nécessaire en production (sans confirmation)
php artisan migrate --force

# Optimiser le chargement de l'application
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Démarrer le processus principal (Supervisord)
exec /usr/bin/supervisord -c /etc/supervisord.conf