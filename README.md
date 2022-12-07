# Streaming-API-legacy
APIs that allow you to receive the updated URL of the most popular streaming sites. (example. euroStreaming)

# NEW VERSION
New version of api is available here: https://github.com/Matt0550/Streaming-API


## API Reference

#### Get url from streaming website
API URL: https://api.matt05.ml/streaming-api
```http
GET /v1/${website}
```

| Parameter | Description   | Available sites                  |
| :-------- | :------------ | :------------------------------- |
| `website` | **Required**. | `View the list below `          |

#### Available sites
- `euroStreaming`
- `altadefinizione`
- `cb01`

#### Response
```json
{"message":"https://eurostreaming.town","status":"success","code":200}
```
## Demo
### Automatic redirect

```
https://api.matt05.ml/streaming-api/eurostreaming
```
You will now be automatically redirected to the website
