# utils.py or inside your views
import requests

def get_client_ip(request):
    x_forwarded_for = request.META.get("HTTP_X_FORWARDED_FOR")
    if x_forwarded_for:
        return x_forwarded_for.split(",")[0]
    return request.META.get("REMOTE_ADDR")

def get_location_from_ip(ip):
    try:
        response = requests.get(f"https://ipapi.co/{ip}/json/")
        data = response.json()
        return {
            "ip": ip,
            "country": data.get("country_name"),
            "region": data.get("region"),
            "city": data.get("city")
        }
    except Exception as e:
        return {"ip": ip, "country": None, "region": None, "city": None}
