import 'package:flutter/material.dart';
import 'package:flutter_gallery/models/painting.dart';

class PaintingDetailScreen extends StatelessWidget {
  final Painting painting;

  PaintingDetailScreen({required this.painting});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(painting.title),
      ),
      body: SingleChildScrollView(
        child: Column(
          children: <Widget>[
            Image.network(
              painting.imageUrl,
              fit: BoxFit.cover,
            ),
            SizedBox(height: 10),
            Text(
              painting.artist,
              style: Theme.of(context).textTheme.headline6,
            ),
            SizedBox(height: 10),
            Text(
              painting.description,
              style: Theme.of(context).textTheme.bodyText2,
              textAlign: TextAlign.center,
            ),
          ],
        ),
      ),
    );
  }
}
