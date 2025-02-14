pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/anammaulana/tokoku.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev --optimize-autoloader'
            }
        }

        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }

        stage('Deploy') {
            steps {
                sh 'rsync -avz . anammaulana@147.93.105.148:/var/www/laravel-toko'
            }
        }
    }
}
