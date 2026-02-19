Service Class
=============

.. php:class:: Service

    Represents a service

    .. php:method:: __construct(string $title, Icon|string $icon, $id = null)

        Create a new Service

        :param string $title: The service title
        :param Icon|string $icon: The service icon. Either one of the pre-defined icons or a string specifying an icon in an icon pack
        :param ?string $id: The service ID (default: no ID)
        :returns: A new instance of `Service`
        :rtype: Service
