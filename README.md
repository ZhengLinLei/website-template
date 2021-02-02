# Dynamic Website template
Beta version without documentation (only internal use for testing)
**Version 1.0** with documentation soon

### Available template language
..* Español (Spanish)

### Configuration file: <config.json>
```
{
    "cache": true,
    "database": {
        "host": "localhost:3306",
        "database": "database",
        "user": "root",
        "password": "root",
        "connection_charset": "utf8mb4",
        "default_error_text": "Error connection $defaultPDOError"
    },
    "mail": {
        "default_email": "default@email.com",
        "default_name": "DefaultName"
    },
    "migration": {
        "database": true,
        "table": true
    },
    "backend": {
        "admin": {
            "type": "database",
            "master": {
                "user": ["admin"],
                "password": ["admin"]
            }
        },
        "plugin": {
            "ecommerce": true,
            "blog": true,
            "comment": true
        }
    }
}
```

**Maintained by ZLL**