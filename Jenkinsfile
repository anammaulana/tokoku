pipeline {
    agent any

    environment {
        SSH_CREDENTIALS_ID = 'abd4393c-1330-465c-9578-ef920792da02'  // ID kredensial di Jenkins
        SERVER_USER = 'anammaulana'
        SERVER_HOST = '147.93.105.148'
        SERVER_PORT = '8080' // Gunakan port SSH, bukan port aplikasi
        DEPLOY_DIR = '/var/www/laravel-toko'
    }

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

        
        stage('SSH Connection') {
            steps {
                sshagent(['abd4393c-1330-465c-9578-ef920792da02']) {
                    sh 'ssh anammaulana@147.93.105.148 "echo Hello from Jenkins"'
                }
            }
        }
    }

        // stage('Deploy to Server') {
        //     steps {
        //         sshagent(credentials: [SSH_CREDENTIALS_ID]) {
        //             sh """
        //             ssh -o StrictHostKeyChecking=no ${SERVER_USER}@${SERVER_HOST} << EOF
        //             cd ${DEPLOY_DIR}
        //             git pull origin main
        //             composer install --no-dev --optimize-autoloader
        //             php artisan migrate --force
        //             php artisan config:clear
        //             php artisan cache:clear
        //             php artisan route:clear
        //             php artisan view:clear
        //             chmod -R 775 storage bootstrap/cache
        //             chown -R www-data:www-data .
        //             systemctl restart apache2
        //             exit
        //             EOF
        //             """
        //         }
        //     }
        // }
    // }
}


        // stage('Deploy') {
        //     steps {
        //         script {
        //             withCredentials([sshUserPrivateKey(credentialsId: SSH_CREDENTIALS_ID, keyFileVariable: 'SSH_KEY', usernameVariable: 'SSH_USER')]) {
        //                 sh '''
        //                     echo "Testing SSH connection..."
        //                     ssh -i $SSH_KEY -o StrictHostKeyChecking=no -p $SERVER_PORT $SSH_USER@$SERVER_HOST "echo 'SSH connection test successful'"

        //                     echo "Syncing files to server..."
        //                     rsync -avz -q --exclude=".git" --exclude="node_modules" --exclude="vendor" \
        //                     -e "ssh -i $SSH_KEY -p $SERVER_PORT -o StrictHostKeyChecking=no" . \
        //                     $SSH_USER@$SERVER_HOST:$DEPLOY_DIR
        //                 '''
        //             }
        //         }
        //     }
        // }