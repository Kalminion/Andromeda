import requests
import asyncio
import json

async def tooltest(parameter):

    api = "http://localhost/Andromeda3/api"
    params = {'target':parameter, 'select':'all'}

    r = requests.get(url = api, headers = params)

    return r.json()

loop = asyncio.get_event_loop()
data = loop.run_until_complete(tooltest('modules_types'))
loop.close()
print(data)