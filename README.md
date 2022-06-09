# Streaming-API

APIs that allow you to receive the updated URL of the most popular streaming sites. (example. euroStreaming)

## API Reference

#### Get url from streaming website

```http
GET https://api.matt05.ml/streaming-api/v1/${website}
```

| Parameter | Description   | Available sites                  |
| :-------- | :------------ | :------------------------------- |
| `website` | **Required**. | `eurostreaming, altadefinizione` |

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
