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

        // stage('Run Tests') {
        //     steps {
        //         sh 'php artisan test'
        //     }
        // }

   stage('Deploy') {
    steps {
        sh '''
            ssh -o StrictHostKeyChecking=no -p 8080 anammaulana@147.93.105.148 "echo 'SSH connection test successful'"
            rsync -avz --exclude=".git" --exclude="node_modules" --exclude="vendor" \
            -e "ssh -p 8080 -o StrictHostKeyChecking=no" . anammaulana@147.93.105.148:/var/www/laravel-tokoku
        '''
    }
}

}
    }

