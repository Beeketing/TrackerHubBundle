TrackerHubBundle
================

Integrate [tracker-hub](https://github.com/Beeketing/tracker-hub) with symfony2

## Basic Usage

Set trackers settings in your config file

``` yaml
# app/config/config.yml

bk_tracker_hub:
    clients:
        beeketing:
            base_url: %beeketing_base_url%
            api_key: %beeketing_api_key%

        customerio:
            site_id: %customer_io_site_id%
            api_key: %customer_io_api_key%

        mixpanel:
            write_token: %mixpanel_write_token%

        indicative:
            api_key: %indicative_api_key%
```

Then track and identify your users by using

``` php
$this->container->get('tracker_hub')->identify($userId, $properties);
$this->container->get('tracker_hub')->track($userId, $event, $params);
```

**Tips:**

1. You should use it with a queue system like RabbitMQ