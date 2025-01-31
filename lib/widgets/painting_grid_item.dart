import 'package:flutter/material.dart';
import 'package:models/painting.dart';

class PaintingGridItem extends StatelessWidget {
  final Painting painting;
  final Function onSelectPainting;

  PaintingGridItem({
    required this.painting,
    required this.onSelectPainting,
  });

  @override
  Widget build(BuildContext context) {
    return InkWell(
      onTap: () => onSelectPainting(painting),
      child: Card(
        elevation: 4,
        margin: EdgeInsets.all(0),
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(15),
        ),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: <Widget>[
            Expanded(
              child: ClipRRect(
                borderRadius: BorderRadius.only(
                  topLeft: Radius.circular(15),
                  topRight: Radius.circular(15),
                ),
                child: Image.network(
                  painting.imageUrl,
                  fit: BoxFit.cover,
                ),
              ),
            ),
            Padding(
              padding: EdgeInsets.all(8),
              child: Text(
                painting.title,
                style: Theme.of(context).textTheme.headline6,
                textAlign: TextAlign.center,
              ),
            ),
          ],
        ),
      ),
    );
  }
}
