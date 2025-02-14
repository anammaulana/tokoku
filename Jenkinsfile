pipeline {
    agent any

    environment {
        SSH_CREDENTIALS_ID = 'b3BlbnNzaC1rZXktdjEAAAAABG5vbmUAAAAEbm9uZQAAAAAAAAABAAAAMwAAAAtzc2gtZW
QyNTUxOQAAACDyhFts4eY2HGNsdyi1wOmlQNhkTAEIgB0BYokEkYlmswAAAKj2bu819m7v
NQAAAAtzc2gtZWQyNTUxOQAAACDyhFts4eY2HGNsdyi1wOmlQNhkTAEIgB0BYokEkYlmsw
AAAEArIqY8zJAGvHocxDwYK9rnuc70C161bzvC2UUALoN+NvKEW2zh5jYcY2x3KLXA6aVA
2GRMAQiAHQFiiQSRiWazAAAAJElDT05QTE4rYW5hbS5tYXVsYW5hQERFU0tUT1AtMzdGRE
xTNQE='  // Ganti dengan ID kredensial SSH di Jenkins
        SERVER_USER = 'anammaulana'
        SERVER_HOST = '147.93.105.148'
        SERVER_PORT = '8080'
        DEPLOY_DIR = '/var/www/laravel-tokoku'
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

        // stage('Run Tests') {
        //     steps {
        //         sh 'php artisan test'
        //     }
        // }

        stage('Deploy') {
            steps {
                script {
                    withCredentials([sshUserPrivateKey(credentialsId: SSH_CREDENTIALS_ID, keyFileVariable: 'SSH_KEY')]) {
                        sh '''
                            ssh -i $SSH_KEY -o StrictHostKeyChecking=no -p $SERVER_PORT $SERVER_USER@$SERVER_HOST "mkdir -p $DEPLOY_DIR && echo 'SSH connection test successful'"
                            
                            rsync -avz -q --exclude=".git" --exclude="node_modules" --exclude="vendor" \
                            -e "ssh -i $SSH_KEY -p $SERVER_PORT -o StrictHostKeyChecking=no" . \
                            $SERVER_USER@$SERVER_HOST:$DEPLOY_DIR
                        '''
                    }
                }
            }
        }
    }
}
