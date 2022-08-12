# Pequeno demo de uso do Minicli

Programa de linha de comando feito somente como exemplo do [Minicli](https://docs.minicli.dev/en/latest/) e seus recursos básicos. Feito para o post [Minicli - Aplicativos linha de comando em PHP](
https://www.botecodigital.dev.br/php/minicli-aplicativos-linha-de-comando-php/).

Diponíveis comando para redimensionador de imagens e aplicar marca d'agua.

```shell
./minicli resize in=<img-original> out=<img-nova> width=<largura> height=<altura> --fit
```

```shell
./minicli watermark in=<img-original> watermark="BotecoDigital" out=<img-nova>
```

