# slack_ping_host
A custom Slack slash command to ping a host.

Install the fping package on the web server then place the php script to be run via web server.

Note: Webserver must be enabled for HTTPS and running with a valid SSL certificate. You can get a free one from Let’s Encrypt.

<img src="http://zappy.jaredlog.com/slack_pings_output.png"></a>

The output will display three possible outcomes:

1) Host is up and responds to pings = Success!

2) Host doesn't exist (not DNS resolvable), hence not pingable.

3) Host exists (DNS resolved) but not responding to pings = Failure because host is down or firewall blocks pings.
