# aws-elb-log-analyzer
Log analyzer for AWS Elastic Load Balancer, built from ground-up in PHP. 

#Usage
Since this "library" is still uner develpoment, the process of reading log files is to 
*Dump the log file somewhere on the system
*Point the `$filename` variable in index.php to that file and running the file index.php on a browser.

#Plans
I plan to build this as a near-realtime log analyzer, will probably host is somewhere for people to use it.
The features would include but not be limited to
* Insights into which user agents are popular
* Which HTTP requests are high bandwidth consuming
* Which requests show high latency
* Hits per second