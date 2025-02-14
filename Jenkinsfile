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
                sh ' rsync -avz --exclude=".git" --exclude="node_modules" --exclude="vendor"  . anammaulana@147.93.105.148:/var/www/laravel-toko'
                // ssh ${DEPLOY_SERVER} "cd ${DEPLOY_PATH} && composer install --no-dev --optimize-autoloader"
                // ssh ${DEPLOY_SERVER} "cd ${DEPLOY_PATH} && php artisan config:clear && php artisan cache:clear"
                // ssh ${DEPLOY_SERVER} "cd ${DEPLOY_PATH} && php artisan storage:link"
                // ssh ${DEPLOY_SERVER} "sudo systemctl restart php8.3-fpm"
            }
        }
    }

    post {
        always {
            echo "Pipeline selesai!"
        }
    }
}
