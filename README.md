# voting-application

voting-application/
├── docker-compose.yml
├── index.php
├── metrics.php              <-- optional (for exposing /metrics endpoint)
├── Dockerfile
├── init.sql                 <-- optional (MySQL initialization)
├── monitoring/
│   ├── docker-compose.yml
│   ├── prometheus.yml
│   └── grafana/
│       ├── datasources/
│       │   └── datasource.yml
│       ├── dashboards/
│       │   ├── app-dashboard.json
│       │   └── infra-dashboard.json
│       └── provisioning/
│           └── dashboards.yaml
└── jenkins/
    └── Jenkinsfile
