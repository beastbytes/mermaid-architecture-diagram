Group Class
===========

.. php:class:: Group

    Represents a group of nodes (Group, Junction, Service)

    .. php:method:: __construct(string $title, Icon|string $icon, $id = null)

        Create a new Group

        :param string $title: The group title
        :param Icon|string $icon: The group icon. Either one of the pre-defined icons or a string specifying an icon in an icon pack
        :param ?string $id: The group ID (default: no ID)
        :returns: A new instance of `Group`
        :rtype: Group

    .. php:method:: addNode(Group|Junction|Service ...$node)

        Add node(s) to the group

        :param Group|Junction|Service ...$node: The node(s) to add
        :returns: A new `Group` instance with the node(s) added
        :rtype: Group

    .. php:method:: withNode(Group|Junction|Service ...$node)

        Set the group node(s)

        :param Group|Junction|Service ...$node: The node(s)
        :returns: A new `Group` instance with the node(s)
        :rtype: Group
