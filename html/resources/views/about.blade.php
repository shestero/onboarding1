<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">About the site</h3>
                    <p><br/></p>
                    <p><u>Wiregate website back-end (On-Boarding task #1)</u><br/></p>
                    <p><br/></p>                    
<div>
    <h2 style="text-decoration: underline">Task Description</h2>
    <ol style="list-style: disc">                    
    Create a back-end application which will have User Entity: email / password, Role Entity: Administrator and User.
    <li>User needs to have the ability to register and reset his password via email.</li>
    <li>User needs to confirm his email.</li>
    <li>User needs ability to edit profile: FIRST_NAME, LAST_NAME, AVATAR;</li>
    <li>Entity Avatar should be stored on S3 compatible storage;</li>
    <li>S3 bucket needs to be PUBLIC;</li>
    <li>There is NO NEED to create PUBLIC S3 bucket programmatically via Application;</li>
    <li>Administrator can delete users;</li>
    <li>User can be promoted to Administrator;</li>
    <li>Application needs to be stateless - all session information stored in REDIS;</li>
    <li>Application needs to print its logs to STDOUT.</li>
    <li>Project needs to have a code style standard and README needs to contain information on how to run code style test;</li>
    <li>README needs to contain information on how to run the application in DEV and PROD modes.</li>
    <li>DEV mode should allow to debug project STEP-BY-STEP using XDebug;</li>
    <li>PROD mode should be packed (copy all necessary sources to start the Application) in single/standalone (PHP+WebServer) Docker Image in order to run it in Kubernetes. There is no need to start the Application in Kubernetes. Only create Docker Image;</li>
    <li>DB, REDIS, S3 - needs to be in a separate containers;</li>
    </ol>
    Front-end part is not important. Can be implemented without CSS on plain HTML.
    <p><br/></p>
</div>
<div>
    <h3 style="text-decoration: underline">Tech</h3>
    <ol style="list-style: circle">
    Following technologies must be used:
    <li>PHP Laravel;</li>
    <li>Minio;</li>
    <li>Maildev;</li>
    <li>Docker;</li>
    <li>Redis;</li>
    </ol>
    <p><br/></p>
</div>
<div>
    <h3 style="text-decoration: underline">Hints</h3>
    <pre>
    maildev:
        image: maildev/maildev
        ports:
        - "8025:1080"

    minio:
        image: minio/minio
        command: server /data --console-address ":9001"
        ports: 
        - '9000:9000'
        - '9001:9001'
        volumes: 
        - ./storage:/data
        environment:
        - "MINIO_ROOT_USER=minio"
        - "MINIO_ROOT_PASSWORD=minio123"
        healthcheck:
        test: ["CMD", "curl", "-f", "http://localhost:9000/minio/health/live"]
        interval: 30s
        timeout: 20s
        retries: 3
    
    mc:
        image: minio/mc
        depends_on:
        minio:
            condition: service_healthy
        restart: on-failure
        entrypoint: >
        /bin/sh -c "
        /usr/bin/mc alias set myminio http://minio:9000 minio minio123;
        /usr/bin/mc mb myminio/mybucket;
        /usr/bin/mc anonymous set public myminio/mybucket;
        "
    </pre>
</div>
                    <hr/>
                    &copy; 2023
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
