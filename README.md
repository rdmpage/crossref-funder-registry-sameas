# Crossref Funder Registry sameAs

Map identifiers in Crossref Funder Registry.

The Crossref Funder Registry is available on GitLab https://gitlab.com/crossref/open_funder_registry as an RDF dump. The file uses the “old style” DOIs with the `http://dx.doi.org` prefix, and does not map organisations to other identifiers (such as ROR). This repository addresses some of these issues.

## DOIs

The file `sameas.php` scans the `registry.rdf` file to extract DOIs for funders and generate triples of the form:

```
<http://dx.doi.org/...> <https://schema.org/sameAs> <https://doi.org/…> .
```

This means that datasets that use “modern” DOIs (i.e., HTTPS prefix and root domain `doi.org`) can be included in SPARQL queries without having convert the identifiers in those SPARQL queries.


