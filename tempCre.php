<?php
require 'aws/aws-autoloader.php';
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;
use Aws\Iam\IamClient;
use Aws\S3\S3Client;  
use Aws\Exception\AwsException;
	$client = new IamClient([
	'region' => 'us-east-1',
	'version' => '2010-05-08'
	]);								
	 $client->createRole([
	'AssumeRolePolicyDocument' => '{
		"Statement": [
		{
			"Effect": "Allow",
			"Principal": { "Service": "ec2.amazonaws.com"},
			"Action": "sts:AssumeRole"
			}
			]
			}', // REQUIRED
			'Description' => 'allows the use DynomoDB and S3',
			'RoleName' => 'RolesForS3AndDynomdbAccess', // REQUIRED
			]);
			
			
			
			
								$sdk = new Aws\Sdk([
									'region'   => 'us-east-1',
									'version'  => 'latest'
								]);
								
$dynamodb = $sdk->createDynamoDb();

$dbTable = [
    'TableName' => 'Raffles',
    'KeySchema' => [
        [
            'AttributeName' => 'firstName',
            'KeyType' => 'HASH'  //Partition key
        ],
        [
            'AttributeName' => 'surName',
            'KeyType' => 'RANGE'  //Sort key
        ]
    ],
    'AttributeDefinitions' => [
        [
            'AttributeName' => 'firstName',
            'AttributeType' => 'S'
        ],
        [
            'AttributeName' => 'surName',
            'AttributeType' => 'S'
        ],

    ],
    'ProvisionedThroughput' => [
        'ReadCapacityUnits' => 10,
        'WriteCapacityUnits' => 10
    ]
];

$dynamodb->createTable($dbTable);

					$s3Client = new S3Client([
						
						'region' => 'us-east-1',
						'version' => 'latest'
					]);	
					$s3Client->createBucket([
							'Bucket' => 'd00214215-bucket',
					]);			
?>