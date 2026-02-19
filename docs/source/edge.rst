Edge Class
==========

.. php:class:: Edge

    Defines an Edge

    .. php:method:: __construct()

        Create an Edge

        :returns: A new instance of ``Edge``
        :rtype: Edge

    .. php:method:: withArrow(Arrow $arrow)

        Set the Edge arrow type

        If not called the arrow type is :php:case:`Arrow:none`

        :param Arrow $arrow: The arrow type
        :returns: A new instance of ``Edge`` with the arrow
        :rtype: Edge

    .. php:method:: withFrom(Junction|Service $node, Direction $direction, bool $group = !self::GROUP)

        Set the `from` node

        .. note::
            This method is required

        :param Junction|Service $node: The node
        :param Direction $direction: The node edge direction
        :param bool $group: Whether the edge should leave
        :returns: A new instance of ``Edge`` with the `from` node
        :rtype: Edge


    .. php:method:: withTo(Junction|Service $node, Direction $direction, bool $group = !self::GROUP)

        Set the `to` node

        .. note::
            This method is required

        :param Junction|Service $node: The node
        :param Direction $direction: The node edge direction
        :param bool $group: Whether the edge should leave
        :returns: A new instance of ``Edge`` with the `to` node
        :rtype: Edge
