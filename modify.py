from mitmproxy import http

def request(flow: http.HTTPFlow) -> None:
    print("Request intercepted!")

def response(flow: http.HTTPFlow) -> None:
    if hasattr(flow.request, 'user_data') and "user_input" in flow.request.user_data:
        user_input = flow.request.user_data["user_input"]
        print("Original Response:", flow.response.text)  # Debugging
        flow.response.text = flow.response.text.replace("You submitted:", user_input)
        print("Modified Response:", flow.response.text)  # Debugging

def request(flow: http.HTTPFlow) -> None:
    # Capture the POST data (user input)
    if flow.request.method == "POST":
        form_data = flow.request.urlencoded_form
        if form_data:
            user_input = form_data.get("user_input")  # Replace with your actual form field name
            if user_input:
                flow.request.user_data = {"user_input": user_input[0]}  # Save first value of the field

def response(flow: http.HTTPFlow) -> None:
    # Modify the response based on the user input
    if hasattr(flow.request, 'user_data') and "user_input" in flow.request.user_data:
        user_input = flow.request.user_data["user_input"]
        # Replace placeholders in the response with the user input
        flow.response.text = flow.response.text.replace("Modified!:", user_input, " Stole your password ;) ")



#from mitmproxy import http

#def response(flow: http.HTTPFlow) -> None:
#    if flow.request.pretty_url == "http://10.0.0.218/index.html":
#        flow.response.text = flow.response.text.replace("Hello", "Goodbye")
