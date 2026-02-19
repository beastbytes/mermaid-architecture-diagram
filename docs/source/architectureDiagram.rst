ArchitectureDiagram Class
=========================

.. php:class:: ArchitectureDiagram

    Represents an architecture diagram

    .. php:method:: addEdge(Edge ...$edge)

        Add edge(s)

        :param Edge ...$edge: The edge(s) to add
        :returns: A new `ArchitectureDiagram` instance with the edge(s) added
        :rtype: ArchitectureDiagram

    .. php:method:: addNode(Group|Junction|Service ...$node)

        Add node(s) to the diagram

        :param Group|Junction|Service ...$node: The node(s) to add
        :returns: A new `ArchitectureDiagram` instance with the node(s) added
        :rtype: ArchitectureDiagram

    .. php:method:: withEdge(Edge ...$edge)

        Set edge(s)

        :param Edge ...$edge: The edge(s)
        :returns: A new `ArchitectureDiagram` instance with the edge(s)
        :rtype: ArchitectureDiagram


    .. php:method:: withNode(Group|Junction|Service ...$node)

        Set the diagram node(s)

        :param Group|Junction|Service ...$node: The node(s)
        :returns: A new `ArchitectureDiagram` instance with the node(s)
        :rtype: ArchitectureDiagram
