# slack_ping_host
A custom Slack slash command to ping a host.

<img src="http://zappy.jaredlog.com/slack_pings_output.png"></a>

The output will display three possible outcomes:

1) Host is up and responds to pings = Success!

2) Host doesn't exist (not DNS resolvable), hence not pingable.

3) Host exists (DNS resolved) but not responding to pings = Failure because host is down or firewall blocks pings.
