Team-Sentry Backend task with PHP

A dockerized micro-service for managing static, external pages
	- add_page
	- retrieve_page_html
	- set_page_markdown
	- list_pages

* ADD PAGE

To add a page, the url(server/api/add_page) accepts a POST request with two values with key: page_name and file_content.

If request is successful it returns json object like so..
{
    "Response_message": "Page added successfully"
}

else it returns a json object like so..
{
    "error(s)": [
        "No file name"
    ]
}

* RETRIEVE PAGE 

To retrieve a page, the url(server/api/retrieve_page) accepts a GET request with one value with key: page_name

If the file exists it returns a json object like so..
{
    "file_content": "<html>\n<body>\n\n<h1>My Heading</h1>\n\n<p>My paragraph.</p>\n\n</body>\n</html>"
}

* SET PAGE MARKDOWN

To retrieve a page in markdown format, the uri(server/api/set_page_markdown) accepts  request with one value with key: page_name

If the file exists, it returns the contents of the file in mardown format in the body of a json object like so..
{
    "markdown_content": "My First Heading\n================\n\n**My first paragraph.**"
}

else it returns the appropriate error code

* TO LIST PAGES

To view a list of available pages, the uri(server/api/list_pages) returns a json object containing the list of files like so..
{
    "1": "file1",
    "2": "file2",
    "3": "file3",
    "4": "file4",
    "5": "file5",
    "6": "file6",
}
